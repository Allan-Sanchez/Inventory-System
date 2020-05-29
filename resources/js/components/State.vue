<template>
    <v-row>
        <v-col sm="12" class="d-flex justify-space-between">
            <div>
                <v-breadcrumbs :items="items">
                    <template v-slot:divider>
                        <v-icon>mdi-forward</v-icon>
                    </template>
                </v-breadcrumbs>
            </div>
        </v-col>

        <v-col sm="12" md="4">
            <v-card class="shadow-card">
                <v-card-title>
                    Inventory State
                </v-card-title>

                <v-card-text>
                    <v-form>
                        <v-text-field
                            :counter="10"
                            label="State"
                            required
                        ></v-text-field>

                        <v-text-field
                            :counter="10"
                            label="Description"
                            required
                        ></v-text-field>

                        <div class="d-flex justify-end align-center mt-5">
                            <v-btn color="indigo" dark> Add</v-btn>
                        </div>
                    </v-form>
                </v-card-text>
            </v-card>
        </v-col>

        <v-col sm="12" md="8">
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
            tableLoading: true,
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
                // { text: "Carbs (g)", value: "carbs" },
                // { text: "Actions", value: "actions", sortable: false }
            ],
            desserts: []
        };
    },
    created(){
        axios.get("http://inventory-system.test/getstate").then(res => {
            // this.user = res.data;
            this.tableLoading = false;
            this.desserts = res.data;
            // console.log(res.data);
        });
    },
    methods: {
        getColor(state) {
            if (state == "store") return "red";
            else if (state == "sold") return "orange";
            else return "green";
        },
        editItem(item) {
            console.log(item);
        },

        deleteItem(item) {
            console.log(item);
        }
    }
};
</script>
