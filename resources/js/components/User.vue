<template>
    <v-row>
        <v-col md="12">
            <div>
                <v-breadcrumbs :items="items">
                    <template v-slot:divider>
                        <v-icon>mdi-forward</v-icon>
                    </template>
                </v-breadcrumbs>
            </div>
        </v-col>
        <v-col md="12">
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
                    :headers="headers"
                    :items="desserts"
                    :search="search"
                >
                    <template v-slot:item.actions="{ item }">
                        <v-icon color="indigo" class="mr-2" @click="editItem(item.id)">
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
            user: {},
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
                    text: "Nombre",
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
            this.user = res.data;
            this.desserts = res.data;
            console.log(res.data)
        });
    },
    methods: {
        editItem(item) {
           console.log(item);
        },

        deleteItem(item) {
           console.log(item)
        }
    }
};
</script>
