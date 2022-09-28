Cypress.Commands.add("login", (username = null, password = null) => {
  username = username || Cypress.env("username");
  password = password || Cypress.env("password");
  let _token;
  cy.visit("/login")
    .getCookie("XSRF-TOKEN")
    .then((cookie) => {
      cy.request({
        method: "POST",
        url: "/admin/login",
        form: true,
        body: {
          username,
          password,
        },
        headers: {
          // Base64 encoded string was URI encoded in headers. Decode it.
          "X-XSRF-TOKEN": decodeURIComponent(cookie.value),
        },
      });
    });
});
