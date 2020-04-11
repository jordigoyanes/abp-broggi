<template>
  <div id="historial" class="historial d-flex flex-column w-100">
    <div class="w-100">
      <div class="d-flex flex-row flex-wrap align-items-center justify-content-between mb-2">
        <h5>Historial</h5>
        <form action class="d-flex flex-row">
          <input
            type="search"
            class="form-control"
            name="buscarIncidencia"
            id="buscarIncidencia"
            placeholder="Buscar Incidencia..."
          />
          <button class="btn btn-primary ml-1" type="submit">Buscar</button>
        </form>
      </div>
      <div class="formFiltros">
        <form action class="p-3" style="background-color:#D7F0F4;">
          <div class="d-flex flex-row justify-content-between flex-wrap">
            <fieldset class="boxFiltroHistorial">
              <label for="data">Data</label>
              <div class="form-inline justify-content-between mb-1">
                <label for="data_desde">Desde</label>
                <input class="form-control ml-1" type="date" name="data_desde" id="data_desde" />
              </div>
              <div class="form-inline justify-content-between mb-1">
                <label for="data_hasta">Fins</label>
                <input class="form-control ml-1" type="date" name="data_hasta" id="data_hasta" />
              </div>
              <label for="hora" class="mt-1">Hora</label>
              <div class="form-inline justify-content-between mb-1">
                <label for="hora_desde">Desde</label>
                <input class="form-control ml-1" type="time" name="hora_desde" id="hora_desde" />
              </div>
              <div class="form-inline justify-content-between mb-1">
                <label for="hora_fins">Fins</label>
                <input class="form-control ml-1" type="time" name="hora_fins" id="hora_fins" />
              </div>
            </fieldset>
            <fieldset class="boxFiltroHistorial">
              <div class="form-group">
                <label for="tipusAlertant">Tipus d'alertant</label>
                <select class="form-control" name="tipusAlertant" id="tipusAlertant">
                  <option value selected disabled hidden>Tots</option>
                  <option
                    v-for="(tipus,index) in tipus_alertants"
                    :key="index"
                    :value="tipus.id"
                  >{{tipus.tipus}}</option>
                </select>
              </div>

              <div class="form-group">
                <label for="alertant">Alertant</label>
                <select class="form-control" name="alertant" id="alertant">
                  <option value="santpau">Hospital de Sant Pau</option>
                  <option value="valldhebron">Hospital Vall d'Hebrón</option>
                </select>
              </div>
            </fieldset>
            <fieldset class="boxFiltroHistorial">
              <div class="form-group">
                <label for="edat">Edat</label>
                <div class="form-inline justify-content-between mb-1">
                  <label for="edat">Desde</label>
                  <input
                    class="form-control ml-1"
                    min="0"
                    max="200"
                    type="number"
                    name="edat"
                    id="edat"
                  />
                </div>
                <div class="form-inline justify-content-between mb-1">
                  <label for="edat">Fins</label>

                  <input
                    class="form-control ml-1"
                    min="0"
                    max="200"
                    type="number"
                    name="edat"
                    id="edat"
                  />
                </div>
              </div>

              <div class="form-group">
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="sexo"
                    id="sexo_home"
                    value="home"
                  />
                  <label class="form-check-label" for="sexo_home">Home</label>
                </div>
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="sexo"
                    id="sexo_dona"
                    value="dona"
                  />
                  <label class="form-check-label" for="sexo_dona">Dona</label>
                </div>
              </div>
            </fieldset>
            <fieldset class="boxFiltroHistorial">
              <div class="form-group">
                <label for="provincia">Provincia</label>
                <select class="form-control" name="provincia" id="provincia">
                  <option
                    v-for="(provincia, index) in provincies"
                    :key="index"
                    :value="provincia.id"
                  >{{provincia.nom}}</option>
                </select>
              </div>
              <!-- FALTA POSAR ELS MUNICIPIS SEGONS LA PROVINCIA -->
              <div class="form-group">
                <label for="municipi">Municipi</label>
                <select class="form-control" name="municipi" id="municipi">
                  <option
                    v-for="(municipi, index) in municipis"
                    :key="index"
                    :value="municipi.id"
                  >{{municipi.nom}}</option>
                </select>
              </div>
            </fieldset>
          </div>
          <div class="d-flex justify-content-end flex-row">
            <div class="actions">
              <button type="reset" class="btn btn-secondary">RESET</button>
              <button type="submit" class="btn btn-primary ml-2">FILTRAR</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <table class="table table-bordered" id="tabla-principal">
      <thead style="background-color: #1CADC3; color:white;">
        <tr>
          <th>ID</th>
          <th>LOCALITZACIÓ</th>
          <th>HORA</th>
          <th>TIPUS</th>
          <th>MUNICIPI</th>
          <th>ADREÇA</th>
          <th>DESCRIPCIÓ</th>
          <th>ESTAT</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(incidencia, index) in incidencias" :key="index">
          <td>#{{incidencia.id }}</td>
          <td>{{ incidencia.localitzacio }}</td>
          <td>{{ incidencia.hora }}</td>
          <td>{{ incidencia.tipus_incident.tipus }}</td>
          <td>{{ incidencia.municipi.nom }}</td>
          <td>{{ incidencia.adreca }}</td>
          <td>{{ incidencia.descripcio }}</td>
          <td>{{ incidencia.estat_incidencia.estat }}</td>
        </tr>
      </tbody>
    </table>
    <nav aria-label="...">
      <ul class="pagination">
        <li aria-label="« Previous" :class="{disabled: current_page == 1 }" class="page-item">
          <a
            class="page-link"
            href="#"
            tabindex="-1"
            @click.prevent="getIncidencias(current_page - 1)"
          >‹</a>
        </li>
        <li
          v-for="(page, index) in last_page"
          :key="index"
          :class="{active: index + 1 == current_page }"
          class="page-item"
        >
          <a class="page-link" href="#" @click.prevent="getIncidencias(page)">{{index+1}}</a>
        </li>
        <li class="page-item" :class="{disabled: current_page == last_page }">
          <a
            aria-label="Next"
            class="page-link"
            href="#"
            @click.prevent="getIncidencias(current_page + 1)"
          >›</a>
        </li>
      </ul>
    </nav>
  </div>
</template>

<script>
export default {
  data: function() {
    return {
      municipis: null,
      incidencias: null,
      provincies: null,
      tipus_alertants: null,
      current_page: 1,
      last_page: 1
    };
  },
  methods: {
    getData() {
      axios
        .get("http://localhost:8080/abp-broggi/public/api/historial")
        .then(response => {
          this.incidencias = response.data.incidencias.data;
          this.municipis = response.data.municipis;
          this.provincies = response.data.provincies;
          this.tipus_alertants = response.data.tipus_alertants;
          this.last_page = response.data.incidencias.last_page;
        })
        .catch(function(error) {
          // handle error
          console.log(error);
        });
    },
    getIncidencias(page) {
      axios
        .get(
          "http://localhost:8080/abp-broggi/public/api/historial?page=" + page
        )
        .then(response => {
          console.log(response);
          this.incidencias = response.data.incidencias.data;
          this.last_page = response.data.incidencias.last_page;
          this.current_page = response.data.incidencias.current_page;
        })
        .catch(function(error) {
          // handle error
          console.log(error);
        });
    }
  },
  mounted() {
    this.getData();
  }
};
</script>
