/// <reference types="cypress" />
import "cypress-file-upload";

describe("CRUD admin", () => {
  before(() => {
    cy.exec("php artisan migrate:fresh --seed");
  });
  beforeEach(() => {
    cy.visit("/admin/login");
    cy.get("#username").type("admin1");
    cy.get("#password").type("12345678");
    cy.get("#login").click();

    cy.get(".card-body > .mb-4").contains("Selamat datang di dashboard admin");
  });

  it("User can access admin index page", () => {
    cy.visit("/admin/admin");

    cy.get(".fw-bold").contains("Admin / Daftar");
    cy.get(".add-new").should("have.text", "Tambah Admin");
    cy.get("tbody > :nth-child(1) > :nth-child(5)").should(
      "have.text",
      "Super Admin"
    );
    cy.get("#offcanvasAddUser").should("have.css", "visibility", "hidden");
  });

  it("User can open offcanvas element to create new admin", () => {
    cy.visit("/admin/admin");

    cy.get(".text-white > .d-none").click();
    cy.get("#offcanvasAddUser").should("have.css", "visibility", "visible");
    cy.get(".button-wrapper > .btn-primary").contains("Unggah Foto Baru");
    cy.get(".button-wrapper > .btn-label-secondary").should("be.enabled");
    cy.get(".me-sm-3").should("be.enabled");
  });

  it("User can create new admin", () => {
    cy.visit("/admin/admin");
    cy.get(".text-white > .d-none").click();

    cy.get("#upload").attachFile("1.png");
    cy.get("#name").type("Akhmadheta Hafid");
    cy.get("#email").type("akhmadheta@gmail.com");
    cy.get("#phone").type("081612541231");
    cy.get("#username").type("adminbtest");
    cy.get("#password").type("password");
    cy.get("#password_confirmation").type("password");
    cy.get('button[type="submit"]').click();
    cy.get(".alert.alert-success").should(
      "have.text",
      "Admin berhasil dibuat!"
    );
  });

  it("Name is required field", () => {
    cy.visit("/admin/admin");
    cy.get(".text-white > .d-none").click();

    cy.get("#upload").attachFile("1.png");
    cy.get("#email").type("akhmadheta@gmail.com");
    cy.get("#phone").type("081612541231");
    cy.get("#username").type("adminbtest");
    cy.get("#password").type("password");
    cy.get("#password_confirmation").type("password");
    cy.get('button[type="submit"]').click();
    cy.get(":nth-child(3) > label.text-danger").should(
      "have.text",
      "Masukkan nama anda!"
    );
  });

  it("Email field must filled by a valid formated email", () => {
    cy.visit("/admin/admin");
    cy.get(".text-white > .d-none").click();

    cy.get("#upload").attachFile("1.png");
    cy.get("#name").type("Akhmadheta Hafid");
    cy.get("#email").type("akhmadheta.com");
    cy.get("#phone").type("081612541231");
    cy.get("#username").type("adminbtest");
    cy.get("#password").type("password");
    cy.get("#password_confirmation").type("password");
    cy.get('button[type="submit"]').click();
    cy.get(":nth-child(4) > label.text-danger").should(
      "have.text",
      "Masukkan alamat email yang valid!"
    );
  });

  it("User can update their profile", () => {
    cy.visit("/admin/profil/1");
    cy.get("#upload").attachFile("2.png");
    cy.get("#phone").clear().type("081612541231");
    cy.get(".mt-2 > .btn-primary").click();
    cy.get(".alert.alert-success").should(
      "have.text",
      "Profile berhasil diupdate!"
    );
  });

  it("User can delete admin", () => {
    cy.visit("/admin/admin");
    cy.get(":nth-child(6) > :nth-child(5) > .d-flex > .btn").click();
    cy.get(".swal2-popup").should("have.css", "visibility", "visible");
    cy.get(".swal2-popup").contains("Admin akan dihapus!");
    cy.get("#swal2-title").contains("Apakah anda yakin?");

    cy.get(".swal2-confirm").click();
    cy.get("#swal2-title").contains("Terhapus!");
    cy.get(".swal2-popup").contains("Admin berhasil dihapus");
  });
});
