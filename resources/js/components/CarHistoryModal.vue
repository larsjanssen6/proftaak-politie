<template>
    <modal name="vehicle-owners-modal"
           :adaptive="true"
           :scrollable="false"
           height="100%"
           width="100%"
           @before-open="beforeOpen"
           @before-close="beforeClose">

        <div class="flex flex-col justify-center items-center h-full relative">
            <div class="flex justify-end w-2/3">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded"
                        @click="$modal.hide('vehicle-owners-modal')">
                    Sluit
                </button>
            </div>

            <div class="w-2/3" v-if="owners.length > 0">

                <div class="border border-grey-light p-4 mt-4 rounded">
                    <strong>Laatste locatie:</strong>&nbsp;

                    {{ location.region }} &nbsp; <strong>/</strong> &nbsp;
                    {{ location.road }} &nbsp; <strong>/</strong> &nbsp;
                    {{ location.locLat }} &nbsp; <strong>/</strong> &nbsp;
                    {{ location.locLong }} &nbsp; <strong>/</strong> &nbsp;
                    {{ location.date }}
                </div>

                <table class="text-left w-full mt-6 bg-white shadow-lg" style="border-collapse:collapse">
                    <thead>
                        <tr class="cursor-pointer">
                            <th class="py-4 px-6 bg-grey font-sans font-medium uppercase text-sm text-black border-b border-grey-light">
                                Voornaam
                            </th>

                            <th class="py-4 px-6 bg-grey font-sans font-medium uppercase text-sm text-black border-b border-grey-light">
                                Achternaam
                            </th>

                            <th class="py-4 px-6 bg-grey font-sans font-medium uppercase text-sm text-black border-b border-grey-light">
                                Start eigendom
                            </th>

                            <th class="py-4 px-6 bg-grey font-sans font-medium uppercase text-sm text-black border-b border-grey-light">
                                Stop eigendom
                            </th>

                            <th class="py-4 px-6 bg-grey font-sans font-medium uppercase text-sm text-black border-b border-grey-light">
                                Is huidige eigenaar
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr class="hover:bg-blue-lightest" v-for="owner in owners">
                            <td class="py-4 px-6 border-b border-grey-light">
                                {{ owner.owner.firstName }}
                            </td>

                            <td class="py-4 px-6 border-b border-grey-light">
                                {{ owner.owner.lastName }}
                            </td>

                            <td class="py-4 px-6 border-b border-grey-light">
                                {{ owner.start_date }}
                            </td>

                            <td class="py-4 px-6 border-b border-grey-light">
                                {{ owner.end_date }}
                            </td>

                            <td class="py-4 px-6 border-b border-grey-light">
                                {{ owner.currentlyOwned ? 'Ja' : 'Nee' }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="center flex-col" v-else>
                <div class="center p-4 text-white mt-8 rounded bg-blue">
                    Voertuig heeft geen eigenaren.
                </div>
            </div>
        </div>
    </modal>
</template>

<script>
    export default {
        data() {
            return {
                owners: [],
                location: null
            }
        },

        methods: {
            beforeOpen(e) {
                axios.get(route('car-history', e.params.id)).then((response) => {
                    this.owners = response.data;
                });

                axios.get(route('car-location', e.params.id)).then(({data}) => {
                    this.location = data;
                });
            },

            beforeClose(e) {

            }
        }
    }
</script>