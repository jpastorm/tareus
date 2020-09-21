import { types } from "../../types/types";
import API from "../helpers/api";

export const auth = async ({ type, payload }) => {
  switch (type) {
    case types.login:

      let result = false;
      await API.post(`login`, payload).then(({data})=>{
          if(data.logged){
            console.log(data)
            result = data.token 
          }
      }).catch(err=>{
        console.log(err)
      });
      return result;

    case types.logout:
      return;

    default:
      break;
  }
};
