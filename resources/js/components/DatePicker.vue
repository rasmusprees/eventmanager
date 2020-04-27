<template>
    <v-date-picker
        v-model="date"
        mode="range"
        :min-date="new Date()"
        :input-props='{
            placeholder: "Vali kuupäevad",
            readonly: true
          }'
        is-inline
        :columns="$screens({ default: 1, md: 2 })"
        locale="et"
        :first-day-of-week="2"
    >

    </v-date-picker>

</template>

<script>

    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data() {
            return {
                date: null,
            };
        },
    }
</script>
