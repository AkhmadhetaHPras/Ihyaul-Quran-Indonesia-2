const { defineConfig } = require("cypress");

module.exports = defineConfig({
  watchForFileChanges: false,
  video: false,
  viewportHeight: 720,
  viewportWidth: 1024,
  e2e: {
    setupNodeEvents(on, config) {
      // implement node event listeners here
    },
    baseUrl: "http://127.0.0.1:8000/",
  },
});
