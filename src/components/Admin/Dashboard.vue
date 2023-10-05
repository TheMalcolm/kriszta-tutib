<template>
    <div class="container">
        <div>
            <b-jumbotron header="Tuti-Bunda kutyakozmetika" lead="Tuti-Bunda kutyakozmetika adminisztrációs rendszer">
                <p>For more information visit website</p>
                <b-button variant="primary" href="#">More Info</b-button>
            </b-jumbotron>
        </div>
    
        <div class="card mt-5">
            <b-table striped hover :items="items"></b-table>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Dashboard',

    data() {
      return {
        items: [
          { age: 40, first_name: 'Dickerson', last_name: 'Macdonald' },
          { age: 21, first_name: 'Larsen', last_name: 'Shaw' },
          { age: 89, first_name: 'Geneva', last_name: 'Wilson' },
          { age: 38, first_name: 'Jami', last_name: 'Carney' }
        ]
      }
    }
}
</script>

<style scoped>

</style>