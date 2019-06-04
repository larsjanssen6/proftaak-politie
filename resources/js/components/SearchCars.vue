<template>
    <div class="w-1/3 mx-auto mt-12">
        <div class="w-full md:ml-8 xs:py-2 md:py-0 relative z-60" v-click-outside="hide">
            <input type="text"
                   class="w-full font-bold appearance-none outline-none leading-normal rounded bg-white pr-4 pl-10 py-2 block"
                   style="box-shadow: 0 2px 3px rgba(0,0,0,.06); border: 1px solid #d9d9d9;"
                   placeholder="Search cars"
                   v-model="search"
                   @keydown.esc="hide()"
                   @input="debouncedOnChange">

            <div class="pointer-events-none absolute inset-y-0 left-0 pl-4 flex items-center">
                <svg class="fill-current pointer-events-none text-gray-600 w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"></path></svg>
            </div>

            <div class="absolute w-full bg-white z-50"
                 style="box-shadow: 0 2px 3px rgba(0,0,0,.06); border: 1px solid #d9d9d9;"
                 v-if="showSearchResult">
                <div class="flex items-center p-2 border-b border-gray hover:bg-gray cursor-pointer"
                     v-if="results.length === 0 && search.length > 0">
                    <h4 class="text-brand-second font-hairline">
                        No results found
                    </h4>
                </div>

                <div class="flex items-center p-2 border-b border-gray hover:bg-gray cursor-pointer"
                     v-for="result in results" @click="markAsStolen(result)">
                    <h4 class="ml-2 text-brand-second font-hairline">
                        {{ result.cartracker.id }} - {{ result.license_plate }}
                    </h4>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import _debounce from 'lodash/debounce';

    export default {
        data() {
            return {
                results: [],
                showSearchResult: true,
                search: ""
            }
        },

        methods: {
            markAsStolen(car) {
                axios.get(route('set-stolen', car.id)).then(() => {
                    window.location.reload();
                })
            },

            hide() {
                this.search = "";
                this.showSearchResult = false;
            },

            onChange() {
                if(this.search.length === 0) {
                    this.showSearchResult = false;
                    return;
                }

                this.showSearchResult = true;

                axios.get(route('cars.search', this.search)).then(({data}) => {
                    this.results = data;
                });
            }
        },

        computed: {
            debouncedOnChange () {
                return _debounce(this.onChange, 500);
            }
        }
    };
</script>