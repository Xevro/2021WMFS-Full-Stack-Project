<template>
  <div class="column-wide">
    <h2>{{ title }}</h2>
      <table class="table">
        <thead>
        <tr>
          <th class="columns" scope="col">Naam</th>
          <th class="columns" scope="col">studenten nummer</th>
          <th class="columns" scope="col">Mentor</th>
          <th class="columns" scope="col">Stage status</th>
          <th scope="col">Actie</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(item, index) in data" :key="'item' + index">
          <td class="columns">{{ item.firstname + ' ' + item.lastname }}</td>
          <td class="columns">{{ item.r_number }}</td>
          <td class="columns">{{ item.mentor.firstname + ' ' + item.mentor.lastname }}</td>
          <td><span class="status">{{ item.approved }}</span></td>
          <td><router-link :to="'/students/' + item.id + '/details'">info</router-link></td>
        </tr>
        </tbody>
      </table>
  </div>
</template>

<script>

export default {
  name: 'StudentsList',
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
}

.search-field {
  float: right;
  padding-bottom: 2rem;
}

li {
  text-decoration: none;
  list-style: none
}

.status {
  color: #1A7EF2;
  font-weight: bold;
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

  .search-field {
    padding-bottom: 1.875rem;
    margin-top: 0.625rem;
  }

  .columns {
    display: none;
  }
}
</style>
