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
        </v-col>

        <v-col sm="12" md="4" class="col-12">
            <v-card class="shadow-card">
                <v-card-title>
                    Inventory Buy
                </v-card-title>

                <v-card-text>
                    <v-form>
                        <v-text-field
                            :counter="10"
                            label="Codigo"
                            disabled
                            required
                        ></v-text-field>

                        <v-select :items="itemBranch" label="Branch"></v-select>

                        <v-select :items="itemSelect" label="State"></v-select>

                        <div class="d-flex justify-end align-center mt-5">
                            <v-btn color="indigo" dark> Add</v-btn>
                        </div>
                    </v-form>
                </v-card-text>
            </v-card>
        </v-col>

        <v-col sm="12" md="8" class="col-12">
            <v-card class="shadow-card" >
                    <v-data-table
                        :headers="headers"
                        :items="desserts"
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
            items: [
                {
                    text: "Home",
                    disabled: false,
                    to: "/home"
                },
                {
                    text: "Buy",
                    disabled: false,
                    to: "/buy"
                }
            ],
            headers: [
                {
                    text: "Dessert (100g serving)",
                    align: "start",
                    sortable: false,
                    value: "name"
                },
                { text: "Calories", value: "calories" },
                { text: "Fat (g)", value: "fat" },
                { text: "Carbs (g)", value: "carbs" },
                { text: "Actions", value: "actions", sortable: false }
            ],
            desserts: [
                {
                    name: "Frozen Yogurt",
                    calories: 159,
                    fat: 6.0,
                    carbs: 24
                },
                {
                    name: "Ice cream sandwich",
                    calories: 237,
                    fat: 9.0,
                    carbs: 37
                },
                {
                    name: "Eclair",
                    calories: 262,
                    fat: 16.0,
                    carbs: 23
                },
                {
                    name: "Cupcake",
                    calories: 305,
                    fat: 3.7,
                    carbs: 67
                },
                {
                    name: "Gingerbread",
                    calories: 356,
                    fat: 16.0,
                    carbs: 49
                }
            ],
            itemSelect: ["Foo", "Bar", "Fizz", "Buzz"],
            itemBranch: ["El carrisal", "Barberena", "El cerinal"]
        };
    },
    methods: {
        getColor(calories) {
            if (calories > 400) return "red";
            else if (calories > 200) return "orange";
            else return "green";
        }
    }
};
</script>
