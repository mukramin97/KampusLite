<template>
    <div class="container">
        <div class="row ">
          <div class="col-md-12 mt-4">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar Asrama</h3>

                <div class="card-tools">
                    <button class="btn btn-success " data-toggle="modal" data-target="#addAsrama">Tambah Baru
                        <i class="fas fa-user-plus"></i>
                    </button>
                  
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nama</th>
                      <th>Pembina</th>
                      <th>Kapasitas</th>
                      <th>Volume</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>

                    <tr v-for="asrama in asramas" :key="asrama.id">
                      <td> {{ asrama.id }} </td>
                      <td> {{ asrama.nama }} </td>
                      <td> {{ asrama.idPembina }} </td>
                      <td> {{ asrama.kapasitas }} </td>
                      <td> {{ asrama.volume }} </td>
                      <td>
                          <a href="#">
                              <i class="fa fa-edit text-blue"></i>
                              
                          </a>
                          |
                          <a href="#">
                              <i class="fa fa-trash text-red"></i>
                          </a>
                      </td>
                    </tr>
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- Modal -->
        
        <div class="modal fade" id="addAsrama" tabindex="-1" role="dialog" aria-labelledby="addAsramaLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addAsramaLabel">Tambah Asrama</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form @submit.prevent="createAsrama">
                    <div class="modal-body">
                        <div class="form-group">
                            <input v-model="form.namaAsrama" type="text" name="namaAsrama" placeholder="Nama Asrama"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('namaAsrama') }">
                            <has-error :form="form" field="namaAsrama"></has-error>
                        </div>
                        <div class="form-group">
                            <input v-model="form.kapasitas" type="number" name="kapasitas" placeholder="Kapasitas Asrama"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('kapasitas') }">
                            <has-error :form="form" field="kapasitas"></has-error>
                        </div>
                        <div class="form-group">
                            <input v-model="form.volume" type="number" name="volume" placeholder="Volume Asrama"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('volume') }">
                            <has-error :form="form" field="volume"></has-error>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        data(){
            return {
                asramas : {},

                form: new Form({
                    namaAsrama: '',
                    kapasitas: '',
                    volume: ''
                }) 
            }
        },
        methods: {
            loadAsrama(){
                axios.get("api/asrama").then(({ data }) => (this.asramas = data));
            },

            createAsrama(){
                this.$Progress.start();
                this.form.post('api/asrama');
                this.$Progress.finish();

                Toast.fire({
                    icon: 'success',
                    title: 'Asrama berhasil ditambahkan!'
                })
            }

        },
        created() {
            this.loadAsrama();
        }
    }
</script>
