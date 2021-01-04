<template>
  <div class="my-2">
    <button
      data-backdrop="static"
      data-keyboard="false"
      data-toggle="modal"
      data-target="#applyModal"
      class="px-5 btn btn-primary"
    >
      Apply <i class="fas fa-external-link-alt"></i>
    </button>
    <div class="modal" tabindex="-1" id="applyModal">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Apply to {{ company }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Modal body text goes here.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      modelOpen: false,
    };
  },
  props: {
    company: String,
  },
  methods: {},
  mounted() {},
  watch: {},
};
</script>

<style>
</style>
