<template>
  <div class="column-wide">
    <h2>{{ title }}</h2>
          <table class="table">
            <thead>
            <tr>
              <th scope="col">Datum</th>
              <th scope="col">Beschrijving</th>
              <th scope="col">info</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(item, index) in data" :key="'item' + index">
              <td>{{ item.date }}</td>
              <td>{{ item.task.length > 50 ? item.task.substring(0, 50 - 3) + "..." : item.task }}</td>
              <td><router-link :to="'/students/' + item.student.id + '/tasks/' + item.id">info</router-link></td>
            </tr>
            </tbody>
          </table>
        </div>
</template>

<script>

export default {
  name: 'TasksList',
  props: ['data', 'title']
}
</script>

<style scoped>
h2 {
  text-align: left;
}

.column-wide {
  margin-left: 30px;
  margin-right: 30px;
}

.table {
  width: 100%;
  max-width: 100%;
  margin-bottom: 1rem;
}

li {
  text-decoration: none;
  list-style: none
}

.table td {
  padding: .3rem;
  vertical-align: top;
  border-top: 1px solid #dee2e6
}

.table th {
  padding: .8rem;
  vertical-align: top;
  border-top: 1px solid #dee2e6
}

a {
  text-decoration: none;
  color: #1A7EF2;
}

@media screen and (max-width: 700px) {
  .column-wide {
    margin-left: .625rem;
    margin-right: .625rem;
  }

  .table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 1rem;
    background-color: transparent
  }
}
</style>
