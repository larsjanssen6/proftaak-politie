<template>
    <div class="w-2/3 mx-auto mt-12">
        <table class="text-left mt-6 bg-white shadow-lg" style="border-collapse:collapse" v-if="vehicles.length > 0">
            <thead>
            <tr class="cursor-pointer">
                <th class="py-4 px-6 bg-grey font-sans font-medium uppercase text-sm text-black border-b border-grey-light">
                    Cartracker id
                </th>

                <th class="py-4 px-6 bg-blue font-sans font-medium uppercase text-sm text-grey border-b border-grey-light">
                    Brand
                </th>

                <th class="py-4 px-6 bg-blue font-sans font-medium uppercase text-sm text-grey border-b border-grey-light">
                    Brandstof type
                </th>

                <th class="py-4 px-6 bg-blue font-sans font-medium uppercase text-sm text-grey border-b border-grey-light">
                    Identificatie
                </th>

                <th class="py-4 px-6 bg-blue font-sans font-medium uppercase text-sm text-grey border-b border-grey-light">
                    Kentekenplaat
                </th>

                <th class="py-4 px-6 bg-blue font-sans font-medium uppercase text-sm text-grey border-b border-grey-light">
                    Categorie
                </th>
            </tr>
            </thead>

            <tbody v-if="vehicles.length > 0">
            <tr class="hover:bg-blue-lightest cursor-pointer"
                v-for="vehicle in vehicles">
                <td class="py-4 px-6 border-b border-grey-light">
                    {{ vehicle.cartracker.id }}
                </td>

                <td class="py-4 px-6 border-b border-grey-light">
                    {{ vehicle.brand }}
                </td>

                <td class="py-4 px-6 border-b border-grey-light">
                    {{ vehicle.fuel_type }}
                </td>

                <td class="py-4 px-6 border-b border-grey-light">
                    {{ vehicle.identification }}
                </td>

                <td class="py-4 px-6 border-b border-grey-light">
                    {{ vehicle.license_plate }}
                </td>

                <td class="py-4 px-6 border-b border-grey-light">
                    {{ vehicle.energy_label.label }}
                </td>
            </tr>
            </tbody>

            <tbody v-else>
            <tr class="flex items-center justify-center p-2">
                <p>
                    Geen resultaat
                </p>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                vehicles: []
            }
        },

        created() {
            axios.get(route('stolen-car.index')).then(({data}) => {
                this.vehicles = data;
            });
        }
    }
</script>
