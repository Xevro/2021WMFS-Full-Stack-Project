<template>
  <div class="column-wide">
    <h2>{{ title }}</h2>
          <table class="table">
            <thead>
            <tr>
              <th scope="col">Datum</th>
              <th scope="col">Beschrijving</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(item, index) in data" :key="'item' + index">
              <td>{{ item.date }}</td>
              <td class="columns">{{ item.description }}</td>
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
  margin-left: 100px;
  margin-right: 100px;
}

.table {
  width: 100%;
  max-width: 100%;
  margin-bottom: 1rem;
  background-color: transparent;
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
  padding: 0.8rem;
  vertical-align: top;
  border-top: 1px solid #dee2e6
}

a {
  text-decoration: none;
  color: #1A7EF2;
}

@media screen and (max-width: 700px) {
  .column-wide {
    margin-left: 10px;
    margin-right: 10px;
  }
}
</style>
