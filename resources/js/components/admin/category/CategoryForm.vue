<template>
  <form @submit="handleSubmit">
    <div class="card card-outline card-primary">
      <div class="card-header">
        <h3 class="card-title"><i class="fas fa-edit"></i> Create new Category</h3>
      </div>
      <div class="card-body">
        <div v-if="errorMessage || successMessage" class="alert alert-dismissable" :class="{'alert-danger': errorMessage, 'alert-success': successMessage}" role="alert">
          {{ errorMessage }} {{ successMessage }}
        </div>
        <div class="mb-3">
          <label for="name" class="col-form-label text-primary">Category Name</label>
          <input
            type="text"
            id="name"
            class="form-control"
            :class="{ 'is-invalid': errors.name }"
            v-model="name"
            autofocus
          />
          <span v-if="errors.name" class="invalid-feedback">
            <strong>{{ errors.name }}</strong>
          </span>
        </div>
        <div class="mb-3">
          <label for="description" class="col-form-label text-primary">Description</label>
          <textarea
            name="description"
            id="description"
            class="form-control"
            :class="{ 'is-invalid': errors.description }"
            v-model="description"
          ></textarea>
          <span v-if="errors.description" class="invalid-feedback">
            <strong>{{ errors.description }}</strong>
          </span>
        </div>
        <div class="mb-1">
          <button title="Save" class="btn btn-success btn-sm btn-block"><i class="fa fa-save"></i></button>
        </div>
      </div>
    </div>
  </form>
</template>

<script>
  const routes = window.app.url
  export default {
    name: 'categoryForm',
    data() {
      return {
        name: null,
        description: null,
        mode: 'create',
        errors: {
          name: null,
          description: null,
        },
        errorMessage: null,
        successMessage: null,
      }
    },
    methods: {
      handleSubmit(evt) {
        if (this.name) {
          const data = {
            name: this.name,
            description: this.description,
            token: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
          }

          if (this.mode == 'create') {
            window.axios
              .post(routes.store, data)
              .then(resp => {
                console.log(resp.data)
                this.errorMessage = null;
                this.successMessage = resp.data.message;
              })
              .catch(err => {
                if (err.response.status == 422) {
                  let {
                    data: {
                      message,
                      errors: { name },
                    },
                  } = err.response
                  console.log(name[0])
                  this.successMessage = null;
                  this.errorMessage = message;
                  this.errors.name = name[0]
                  this.name = ''
                }
                return
              })
          }
        }

        this.errors.name = null

        if (!this.name) {
          this.errors.name = 'Name field cannot be empty'
        }

        evt.preventDefault()
      },
    },
    mounted() {},
  }
</script>

<style></style>
