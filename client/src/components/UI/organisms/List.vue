<template>
  <div class="column-wide">
    <h2>{{ title }}</h2>
          <table class="table">
            <thead>
            <tr>
              <th scope="col">Bedrijf</th>
              <th class="columns" scope="col">Toegevoegd op</th>
              <th class="columns" scope="col">Start datum</th>
              <th class="columns" scope="col">End datum</th>
              <th class="columns" scope="col">Beschrijving</th>
              <th scope="col">status voorstel</th>
              <th scope="col">Actie</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(artikel, index) in data" :key="'artikel' + index">
              <td><a href="/">{{ artikel.company }}</a></td>
              <td class="columns">{{ artikel.created_on }}</td>
              <td class="columns">{{ artikel.start_date }}</td>
              <td class="columns">{{ artikel.end_date }}</td>
              <td class="columns">{{ artikel.description }}</td>
              <td><span class="status">{{ artikel.status }}</span></td>
              <td><a href="/">info</a></td>
            </tr>
            </tbody>
          </table>
        </div>
</template>

<script>

export default {
  name: 'List',
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

  .table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 1rem;
    background-color: transparent
  }

  .columns {
    display: none;
  }
}
</style>
