import { types } from "../../types/types";
import API from "../helpers/api";

export const auth = async ({ type, payload }) => {
  switch (type) {
    case types.login:
      const {
        data: { token },
      } = await API.post(`login`, payload);
      console.log(token);
      return token;

    case types.logout:
      return;

    default:
      break;
  }
};
