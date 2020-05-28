
<!-- this template will be added in the "my-datepicker" div in the new-mission.blade file -->
<template>
    <div>
        <!-- setting attributes to the datepicker, these attributes define how the datepicker
         will look and function like -->
        <v-date-picker
            v-model="dateRange"
            mode="range"
            :min-date="new Date()"
            is-inline
            :columns="$screens({ default: 1, md: 2 })"
            locale="et"
            :first-day-of-week="2"
        >
        </v-date-picker>
        <!-- adding input fields for database queries -->
        <input type="hidden" name="from_date" v-model="dateRange.start.toLocaleDateString()">
        <input type="hidden" name="to_date" v-model="dateRange.end.toLocaleDateString()">
    </div>
</template>

<script>

    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data() {
            return {
                //setting default values for start and end attributes
                dateRange: {
                    start: new Date,
                    end: new Date
                }
            };
        },
    }
</script>
