<template>
  <div id="historial" class="historial d-flex flex-column w-100">
    <div class="w-100 mb-2">
      <div class="d-flex flex-row flex-wrap align-items-center justify-content-between mb-2">
        <h5>Historial</h5>
        <div action class="d-flex flex-row">
          <input
            type="search"
            class="form-control"
            name="buscarIncidencia"
            id="buscarIncidencia"
            placeholder="ID del incident..."
            v-model="search"
          />
          <button class="btn btn-primary ml-1" @click.prevent="searchIncidencia">Cerca</button>
        </div>
      </div>
      <div class="formFiltros">
        <form action class="p-3" style="background-color:#D7F0F4;">
          <div class="d-flex flex-row justify-content-between flex-wrap">
            <fieldset class="boxFiltroHistorial col-4">
              <label for="data">Data</label>
              <div class="form-inline justify-content-between mb-1">
                <label for="data_desde">Desde</label>
                <input
                  class="form-control ml-1"
                  type="date"
                  name="data_desde"
                  v-model="data_desde"
                  id="data_desde"
                />
              </div>
              <div class="form-inline justify-content-between mb-1">
                <label for="data_hasta">Fins</label>
                <input
                  class="form-control ml-1"
                  type="date"
                  v-model="data_hasta"
                  name="data_hasta"
                  id="data_hasta"
                />
              </div>
              <label for="hora" class="mt-1">Hora</label>
              <div class="form-inline justify-content-between mb-1">
                <label for="hora_desde">Desde</label>
                <input
                  class="form-control ml-1"
                  type="time"
                  v-model="hora_desde"
                  name="hora_desde"
                  id="hora_desde"
                />
              </div>
              <div class="form-inline justify-content-between mb-1">
                <label for="hora_fins">Fins</label>
                <input
                  class="form-control ml-1"
                  type="time"
                  v-model="hora_fins"
                  name="hora_fins"
                  id="hora_fins"
                />
              </div>
            </fieldset>
            <fieldset class="boxFiltroHistorial col-4">
              <div class="form-group">
                <label for="tipus_incidencia">Tipus d'incidència</label>
                <select
                  class="form-control"
                  v-model="tipus_incident"
                  name="tipus_incidencia"
                  id="tipus_incidencia"
                >
                  <option
                    v-for="(tipus_incident, index) in all_tipus_incident"
                    :key="index"
                    :value="tipus_incident.id"
                  >{{tipus_incident.tipus}}</option>
                </select>
              </div>
              <div class="form-group m-0">
                <label for="municipi">Municipi</label>
                <select class="form-control" v-model="municipi" name="municipi" id="municipi">
                  <option
                    v-for="(municipi, index) in municipis"
                    :key="index"
                    :value="municipi.id"
                  >{{municipi.nom}}</option>
                </select>
              </div>
            </fieldset>
            <fieldset class="boxFiltroHistorial col-4">
              <div class="form-group">
                <label for="tipusAlertant">Tipus d'alertant</label>
                <select
                  class="form-control"
                  v-model="tipus_alertant"
                  name="tipusAlertant"
                  id="tipusAlertant"
                >
                  <!-- <option value selected disabled hidden>Tots</option> -->
                  <option
                    v-for="(tipus_alertant,index) in all_tipus_alertant"
                    :key="index"
                    :value="tipus_alertant.id"
                  >{{tipus_alertant.tipus}}</option>
                </select>
              </div>

              <div class="form-group">
                <label for="alertant">Alertant</label>
                <select class="form-control" v-model="alertant" name="alertant" id="alertant">
                  <option
                    v-for="(alertant, index) in alertants"
                    :key="index"
                    :value="alertant.id"
                  >{{alertant.nom}}</option>
                </select>
              </div>
            </fieldset>
          </div>
          <div class="d-flex justify-content-end flex-row align-items-end">
            <div class="actions">
              <button type="reset" @click.prevent="reset" class="btn btn-secondary">RESET</button>
              <button type="submit" @click.prevent="filtrar" class="btn btn-primary ml-2">FILTRAR</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div v-if="incidencias == 0 || incidencias == null">
      <div class="alert alert-warning" role="alert">Cap incidència trobada</div>
    </div>
    <div v-else>
      <table class="table table-bordered" id="tabla-principal">
        <thead style="background-color: #1CADC3; color:white;">
          <tr>
            <th>ID</th>
            <th>LOCALITZACIÓ</th>
            <th>HORA</th>
            <th>DATA</th>
            <th>TIPUS</th>
            <th>MUNICIPI</th>
            <th>ADREÇA</th>
            <th>ALERTANT</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(incidencia, index) in incidencias" :key="index">
            <td>#{{incidencia.id }}</td>
            <td>{{ incidencia.localitzacio }}</td>
            <td>{{ incidencia.hora }}</td>
            <td>{{ incidencia.data }}</td>
            <td>{{ incidencia.tipus_incident.tipus }}</td>
            <td>{{ incidencia.municipi.nom }}</td>
            <td>{{ incidencia.adreca }}</td>
            <td>
              <a :href="'/abp-broggi/public/alertant/' + incidencia.alertants_id">Veure alertant</a>
            </td>
          </tr>
        </tbody>
      </table>
      <nav aria-label="...">
        <ul class="pagination">
          <li aria-label="« Previous" :class="{disabled: current_page == 1 }" class="page-item">
            <a class="page-link" href="#" tabindex="-1" @click.prevent="filtrar(current_page - 1)">‹</a>
          </li>
          <li
            v-for="(page, index) in last_page"
            :key="index"
            :class="{active: index + 1 == current_page }"
            class="page-item"
          >
            <a class="page-link" href="#" @click.prevent="filtrar(page)">{{index+1}}</a>
          </li>
          <li class="page-item" :class="{disabled: current_page == last_page }">
            <a
              aria-label="Next"
              class="page-link"
              href="#"
              @click.prevent="filtrar(current_page + 1)"
            >›</a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</template>

<script>
export default {
  data: function() {
    return {
      data_desde: null,
      data_hasta: null,
      hora_desde: null,
      hora_fins: null,
      search: null,
      edat_desde: null,
      edat_fins: null,
      provincia: null,
      sexo_home: null,
      sexo_dona: null,
      alertant: null,
      alertants: null,
      municipi: null,
      tipus_incident: null,

      all_tipus_incident: null,
      municipis: null,
      incidencias: [],
      provincies: null,
      tipus_alertant: null,
      all_tipus_alertant: null,

      current_page: 1,
      last_page: 1
    };
  },
  methods: {
    searchIncidencia() {
      axios
        .post("/abp-broggi/public/api/historial/search", {
          search: this.search
        })
        .then(response => {
          console.log(response);
          this.incidencias = response.data.data;
          this.current_page = response.data.current_page;
          this.last_page = response.data.last_page;
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    reset() {
      this.data_desde = null;
      this.data_hasta = null;
      this.hora_desde = null;
      this.hora_fins = null;
      this.search = null;
      this.edat_desde = null;
      this.edat_fins = null;
      this.provincia = null;
      this.sexo_home = null;
      this.sexo_dona = null;
      this.tipus_alertant = null;
      this.alertant = null;
      this.alertants = null;
      this.municipi = null;
      this.tipus_incident = null;
    },
    getData() {
      axios
        .get("/abp-broggi/public/api/historial")
        .then(response => {
          this.incidencias = response.data.incidencias.data;
          this.municipis = response.data.municipis;
          this.provincies = response.data.provincies;
          this.all_tipus_alertant = response.data.tipus_alertants;
          this.all_tipus_incident = response.data.tipus_incident;
          this.last_page = response.data.incidencias.last_page;
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    filtrar(page) {
      console.log(this.incidendias);
      let filtros = {};
      if (this.data_desde) {
        filtros.from_date = this.data_desde;
      }
      if (this.data_desde) {
        filtros.to_date = this.data_desde;
      }
      if (this.hora_desde) {
        filtros.from_hora = this.hora_desde;
      }
      if (this.hora_fins) {
        filtros.to_hora = this.hora_fins;
      }
      if (this.municipi) {
        filtros.municipi_id = this.municipi;
      }
      if (this.tipus_alertant) {
        filtros.tipus_alertant = this.tipus_alertant;
      }
      if (this.tipus_incident) {
        filtros.tipus_incident = this.tipus_incident;
      }
      if (this.alertant) {
        filtros.alertant = this.alertant;
      }
      console.log("Filtros a aplicar:");
      console.log(filtros);
      axios
        .post("/abp-broggi/public/api/historial?page=" + page, filtros)
        .then(response => {
          console.log(response);
          this.incidencias = response.data.data;
          this.current_page = response.data.current_page;
          this.last_page = response.data.last_page;
        })
        .catch(function(error) {
          console.log(error);
        });
    }
  },
  mounted() {
    this.getData();
  },
  watch: {
    tipus_alertant: function(val) {
      axios
        .post("/abp-broggi/public/api/alertant", {
          tipus_alertant: val
        })
        .then(response => {
          console.log(response);
          this.alertants = response.data;
        })
        .catch(function(error) {
          console.log(error);
        });
    }
  }
};
</script>
