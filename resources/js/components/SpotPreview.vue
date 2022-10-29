<template>
    <div class="">
        <input type="text" name="spot" v-model="spot" @blur="onBlur" class="px-2 py-2" placeholder="スポットを追加" />
        <iframe v-show="spot != ''" :src="src" width='50%' height='300' frameborder='0'></iframe>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                spot: '',
                src:''
            }
        },
        methods: {
            onBlur: function() {
                if (this.spot !== ''){
                    let mapApiKey = process.env.MIX_GOOGLE_MAP_API;
                    this.src = `https://www.google.com/maps/embed/v1/place?key=${ mapApiKey }&q=${ this.spot }`
                }
            }
        }
    }
</script>