<template>
    <div class="container">
        <div class="row">
            <div class="col-6 offset-3">
                <div class="card p-5 mt-5">
                    <form action="">
                        <div class="form-group mb-3">
                            <label for="name">Név</label>
                            <input type="text" class="form-control" v-model="form.name">
                        </div>
                
                        <div class="form-group">
                            <label for="">Nap kiválasztása</label>
                            <select name="day" id="day" v-model="form.day" class="form-control">
                                <option :value="key" v-for="(day, key) in days" v-bind:key="key">{{ day }}</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    name: 'CosmeticsAppointment',

    data() {
        return {
            form: {
                name: '',
            },
            days: {
                day1: '2023 október 6.',
                day2: '2023 október 7.',
            }
        }
    }
}
</script>

<style scoped>
</style>