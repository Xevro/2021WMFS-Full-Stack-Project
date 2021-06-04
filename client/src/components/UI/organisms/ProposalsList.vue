<template>
  <div class="column-wide">
    <div class="search-field">
      <InputSearchField class="input-field" name="Search" type="text" placeholder="Search"/>
    </div>
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
        <tr v-for="(item, index) in data" :key="'item' + index">
          <td><router-link :to="'/companies/' + item.company.id + '/proposals/' + item.id">{{ item.company.name }}</router-link></td>
          <td class="columns">{{ item.created_on }}</td>
          <td class="columns">{{ item.start_period }}</td>
          <td class="columns">{{ item.end_period }}</td>
          <td class="columns">{{ item.description.length > 50 ? item.description.substring(0, 50 - 3) + "..." : item.description }}</td>
          <td><span class="status">{{ item.status }}</span></td>
          <td><router-link :to="'/companies/' + item.company.id + '/proposals/' + item.id">info</router-link></td>
        </tr>
        </tbody>
      </table>
  </div>
</template>

<script>
import InputSearchField from '@/components/UI/molecules/InputSearchField.vue'

export default {
  name: 'ProposalsList',
  props: ['data', 'title'],
  components: {
    InputSearchField
  }
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
