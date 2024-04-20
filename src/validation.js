import { extend } from "vee-validate";
import { required, email, confirmed } from "vee-validate/dist/rules";

extend("required", {
  ...required,
  message: "A mező kitöltése kötelező!"
});

extend("email", {
  ...email,
  message: "Kérjük adjon meg érvényes e-mail címet!"
});

extend("phone", {
  validate: value => {
    const regex = new RegExp(/^(\+36|06)(20|30|50|70)(\d{7})$/);
    return regex.test(value);
  },
  message: "Kérjük adjon meg érvényes telefonszámot!"
});
