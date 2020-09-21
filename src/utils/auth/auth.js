import { types } from "../../types/types";
import API from "../helpers/api";

export const auth = async ({ type, payload }) => {
  switch (type) {
    case types.login:
      // const {
      //   data: { token },
      // } = await API.post(`login`, payload);
      // console.log(token);
      await API.post('login',payload).then(res=>{
        const {data:{token}} =res.data
        return token;
      }).catch(error=>{
        return false
      })
      break;
    case types.logout:
      return;

    default:
      break;
  }
};
