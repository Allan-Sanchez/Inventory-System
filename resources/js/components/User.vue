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

            <div>
                <v-btn color="teal" dark>Create User</v-btn>
            </div>
        </v-col>
        <v-col md="4">
            <v-card>
                <v-card-title class="d-flex justify-center">
                    User Detail
                </v-card-title>
                <v-card-text class="d-flex justify-center flex-column">
                    <div class="d-flex justify-center">
                        <v-avatar height="100" width="100">
                            <img
                                src="https://cdn.vuetifyjs.com/images/john.jpg"
                                alt="John"
                            />
                        </v-avatar>
                    </div>
                    <div>
                        <v-text-field
                            :counter="20"
                            label="Name"
                            v-model="user.name"
                            required
                        ></v-text-field>

                        <v-text-field
                            :counter="20"
                            v-model="user.email"
                            label="Email"
                            required
                        ></v-text-field>

                    </div>
                    <div class="d-flex justify-end mt-5">
                        <v-btn color="indigo" dark>Editar</v-btn>
                    </div>
                </v-card-text>
            </v-card>
        </v-col>
        <v-col md="8">
            <v-card>
                <v-card-title>
                    Users
                    <v-spacer></v-spacer>
                    <v-text-field
                        v-model="search"
                        append-icon="mdi-magnify"
                        label="Search"
                        single-line
                        hide-details
                    ></v-text-field>
                </v-card-title>
                <v-data-table
                    item-key="email"
                    class="elevation-1"
                    :loading="tableLoading"
                    loading-text="Loading... Please wait"
                    :headers="headers"
                    :items="desserts"
                    :search="search"
                >
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
            user: {
                name:"Allan",
                email:"admin@gmai.com"
            },
            items: [
                {
                    text: "Home",
                    disabled: false,
                    to: "/home"
                },
                {
                    text: "User",
                    disabled: false,
                    to: "/user"
                }
            ],
            search: "",
            headers: [
                {
                    text: "Name",
                    align: "start",
                    sortable: false,
                    value: "name"
                },
                { text: "Email", value: "email" },
                { text: "Fecha de Creacion", value: "created_at" },
                { text: "Actions", value: "actions", sortable: false }
            ],
            desserts: []
        };
    },
    created() {
        axios.get("http://inventory-system.test/getUser").then(res => {
            // this.user = res.data;
            this.tableLoading = false;
            this.desserts = res.data;
            // console.log(res.data);
        });
    },
    methods: {
        editItem(item) {
            console.log(item);
        },

        deleteItem(item) {
            console.log(item);
        }
    }
};
</script>
