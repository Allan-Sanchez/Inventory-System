<template>
    <v-row>
        <v-col sm="12" class="col-12 d-flex justify-space-between">
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

        <v-col sm="12" md="4" class="col-12">
            <v-card class="shadow-card">
                <v-card-title>
                    Inventory Location
                </v-card-title>

                <v-card-text>
                    <v-form @submit.prevent="addLocation()" ref="form"
                    v-model="valid" >
                        <v-text-field
                            v-model="nameManager"
                            :counter="30"
                            :rules="nameRules"
                            label="Name Manager"
                            required
                        ></v-text-field>

                        <v-text-field
                            v-model="branch"
                            :counter="40"
                            label="Name Branch"
                            :rules="nameRules"
                            required
                        ></v-text-field>

                        <v-text-field
                            v-model="address"
                            :counter="40"
                            :rules="nameRules"
                            label="Address"
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

        <v-col sm="12" md="8" class="col-12">
            <v-card class="shadow-card">
                    <v-data-table
                        :headers="headers"
                        :items="desserts"
                        :loading="tableLoading"
                        loading-text="Loading... Please wait"
                        class="elevation-1"
                    >
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
            nameManager:'',
            branch:'',
            address:'',
            idLocation :null,
            btnedit:false,
            items: [
                {
                    text: "Home",
                    disabled: false,
                    to: "/home"
                },
                {
                    text: "Location",
                    disabled: false,
                    to: "/location"
                }
            ],
            headers: [
                {
                    text: "Name Branch",
                    align: "start",
                    sortable: false,
                    value: "name"
                },
                { text: "Name Manager", value: "nameManager" },
                { text: "Address", value: "address" },
                { text: "Actions", value: "actions", sortable: false }
            ],
            desserts: [ ]
        };
    },
    created(){
        this.getData();
    },
    methods: {
        getColor(calories) {
            if (calories > 400) return "red";
            else if (calories > 200) return "orange";
            else return "green";
        },
       async getData(){
           let res = await axios.get("http://inventory-system.test/getlocation");
            this.tableLoading = false;
            this.desserts = res.data;
        },
        async addLocation(){
            if (this.nameManager !== '' && this.address !== '' && this.branch !== '') {
                //  these = this;
                let test  = await axios.post('http://inventory-system.test/getlocation', {
                     name:this.branch,
                     nameManager: this.nameManager,
                     address: this.address
                    })
                this.branch = ' ';
                this.nameManager = ' ';
                this.address = ' ';
                this.colorSnackbar ='green';
                this.text = test.data;
                this.snackbar = true;

                this.getData();

            }else{
                this.text = 'Please fill the input.';
                this.snackbar = true;
                return;
            }
            
        },
        async editItem(item) {
            let res = await axios.get(`http://inventory-system.test/getlocation/${item}/edit`);
            this.branch = res.data.name;
            this.nameManager = res.data.nameManager;
            this.address = res.data.address;
            this.idLocation = res.data.id;
            this.btnedit = true;
        },
        async updateItem(){
            if (this.nameManager !== '' && this.address !== '' && this.branch !== '') {
                //  these = this;
    
                let res  = await axios.put(`http://inventory-system.test/getlocation/${this.idLocation}`,{
                    name:this.branch,
                    nameManager: this.nameManager,
                    address: this.address
                });

                this.branch = ' ';
                this.nameManager = ' ';
                this.address = ' ';
                this.btnedit = false;
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
        async deleteItem(item) {
            let res = await axios.delete(`http://inventory-system.test/getlocation/${item}`);
                this.colorSnackbar ='green';
                this.text = res.data;
                this.snackbar = true;
                this.getData();
        }

    }
};
</script>
