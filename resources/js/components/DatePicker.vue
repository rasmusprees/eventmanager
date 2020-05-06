
<template>

    <v-date-picker
        v-model="from_date"
        mode="range"
        :min-date="new Date()"
        :input-props='{
            placeholder: "Vali kuupäevad",
            name: "from_date",
            id: "from_date"
          }'
        readonly: false
        name="from_date"
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
                from_date: null

            };
        },
    }
</script>
