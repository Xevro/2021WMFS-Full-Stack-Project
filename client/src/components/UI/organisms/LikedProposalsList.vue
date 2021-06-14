<template>
  <div>
    <h2>{{ title }}</h2>
          <table class="table">
            <thead>
            <tr>
              <th scope="col">Bedrijf</th>
              <th class="columns" scope="col">Toegevoegd op</th>
              <th class="columns" scope="col">Start datum</th>
              <th class="columns" scope="col">End datum</th>
              <th class="columns" scope="col">Beschrijving</th>
              <th scope="col">Actie</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(item, index) in data" :key="'item' + index">
              <td><router-link :to="'/companies/' + item.proposal.company.id + '/proposals/' + item.proposal.id">{{ item.proposal.company.name }}</router-link></td>
              <td class="columns">{{ item.proposal.created_on }}</td>
              <td class="columns">{{ item.proposal.start_period }}</td>
              <td class="columns">{{ item.proposal.end_period }}</td>
              <td class="columns">{{ item.proposal.description.length > 50 ? item.proposal.description.substring(0, 50 - 3) + "..." : item.proposal.description }}</td>
              <td><router-link :to="'/companies/' + item.proposal.company.id + '/proposals/' + item.proposal.id">info</router-link></td>
            </tr>
            </tbody>
          </table>
        </div>
</template>

<script>

export default {
  name: 'LikedProposalsList',
  props: ['data', 'title']
}
</script>

<style scoped>
h2 {
  text-align: left;
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
