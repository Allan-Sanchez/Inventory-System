<template>
    <v-row>
        <v-col sm="12" class=" col-12 d-flex justify-space-between">
            <div>
                <v-breadcrumbs :items="items">
                    <template v-slot:divider>
                        <v-icon>mdi-forward</v-icon>
                    </template>
                </v-breadcrumbs>
            </div>
            <v-snackbar
              v-model="snackbar"
              :timeout="timeout"
              :color="colorSnackbar"
              :top="'top'"
            >
              {{ text }}
              <v-btn
                dark
                text
                @click="snackbar = false"
              >
                Close
              </v-btn>
            </v-snackbar>
        </v-col>

        <v-col class="col-12" sm="12" md="4">
            <v-card class="shadow-card">
                <v-card-title>
                    Inventory State
                </v-card-title>

                <v-card-text>
                    <v-form @submit.prevent="addState()" ref="form"
                    v-model="valid">
                        <v-text-field
                            :counter="10"
                            :rules="nameRules"
                            label="State"
                            v-model="nameState"
                            required
                        ></v-text-field>

                        <v-text-field
                            :counter="30"
                            label="Description"
                            v-model="descriptionState"
                            :rules="nameRules"
                            required
                        ></v-text-field>

                        <div class="d-flex justify-end align-center mt-5">
                            <v-btn v-if="!btnedit" type="submit" color="indigo" dark> Add</v-btn>
                            <v-btn v-else type="button" color="success" dark @click="updateItem()"> Update</v-btn>
                        </div>
                    </v-form>
                </v-card-text>
            </v-card>
        </v-col>

        <v-col class="col-12" sm="12" md="8">
            <v-card class="shadow-card">
                    <v-data-table
                        :headers="headers"
                        :items="desserts"
                        :loading="tableLoading"
                        loading-text="Loading... Please wait"
                        class="elevation-1"
                    >
                        <template v-slot:item.state="{ item }">
                            <v-chip :color="getColor(item.state)" dark>{{
                                item.state
                            }}</v-chip>
                        </template>

                        <template v-slot:item.created_at="{ item }">
                            <timeago :datetime="item.created_at"></timeago>
                        </template>

                        <template v-slot:item.actions="{ item }">
                            <v-icon
                                color="indigo"
                                class="mr-2"
                                @click="editItem(item.id)"
                            >
                                mdi-pencil
                            </v-icon>
                            <v-icon color="red" @click="deleteItem(item.id)">
                                mdi-delete
                            </v-icon>
                        </template>
                    </v-data-table>
            </v-card>
        </v-col>
    </v-row>
</template>

<script>
export default {
    data() {
        return {
            colorSnackbar:'red',
            snackbar: false,
            text: 'My timeout is set to 2000.',
            timeout: 5000,
            tableLoading: false,
            nameRules: [
              v => !!v || 'input is required',
              v => (v && v.length <= 40) || 'input must be less than 10 characters',
            ],
            valid: true,
            btnedit:false,
            idState:null,
            nameState: '',
            descriptionState:'',
            items: [
                {
                    text: "Home",
                    disabled: false,
                    to: "/home"
                },
                {
                    text: "State",
                    disabled: false,
                    to: "/state"
                }
            ],
            headers: [
                {
                    text: "Description",
                    align: "start",
                    sortable: false,
                    value: "description"
                },
                { text: "State", value: "state" },
                { text: "Fecha", value: "created_at" },
                { text: "Actions", value: "actions", sortable: false }
            ],
            desserts: []
        };
    },
    created(){
        this.getData(); 
    },
    methods: {
        getColor(state) {
            if (state == "sold") return "red";
            else if (state == "break") return "orange";
            else return "green";
        },
        async getData(){
           let res = await axios.get("http://inventory-system.test/getstate");
            this.tableLoading = false;
            this.desserts = res.data;
        },
        
        async addState(){
            if (this.nameState !== '' && this.descriptionState !== '' ) {
                //  these = this;
                let res  = await axios.post('http://inventory-system.test/getstate', {
                     state:this.nameState,
                     description: this.descriptionState
                    })
                this.nameState = ' ';
                this.descriptionState = ' ';
                this.colorSnackbar ='green';
                this.text = res.data;
                this.snackbar = true;

                this.getData();

            }else{
                this.text = 'Please fill the input.';
                this.snackbar = true;
                return;
            }
            
        },
        async editItem(item) {
            let res = await axios.get(`http://inventory-system.test/getstate/${item}/edit`);
            this.nameState = res.data.state;
            this.descriptionState = res.data.description;
            this.idState = res.data.id;
            this.btnedit = true;
        },
        async updateItem(){
            if (this.nameState !== '' && this.descriptionState !== '' ) {
                //  these = this;
                let res  = await axios.put(`http://inventory-system.test/getstate/${this.idState}`, {
                     state:this.nameState,
                     description: this.descriptionState
                    })
                this.nameState = ' ';
                this.descriptionState = ' ';
                this.colorSnackbar ='green';
                this.text = res.data;
                this.snackbar = true;
                this.btnedit = false;
                this.getData();

            }else{
                this.text = 'Please fill the input.';
                this.snackbar = true;
                return;
            }
            
        },
        async deleteItem(item) {
            let res = await axios.delete(`http://inventory-system.test/getstate/${item}`);
                this.colorSnackbar ='green';
                this.text = res.data;
                this.snackbar = true;
                this.getData();
        }
    }
};
</script>
