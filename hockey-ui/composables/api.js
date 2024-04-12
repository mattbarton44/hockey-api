import axios from 'axios';

const catcher = (e) => console.log(e);
const apiURL = 'http://localhost/api';

const api = {
  competitions: {
    index: async (handler) => {
      await axios.get(`${apiURL}/competitions`)
      .then((response) => { handler(response.data.data); })
      .catch(catcher)
    },
    show: async (competitionId, handler) => {
      await axios.get(`${apiURL}/competitions/${competitionId}`)
      .then((response) => { handler(response.data.data); })
      .catch(catcher)
    },
    store: async (data, handler) => {
      await axios.post(`${apiURL}/competitions`,
        data,
        { headers: { 'Content-Type': 'multipart/form-data' } },
      )
      .then((response) => { handler(); })
      .catch(catcher)
    },
    update: async (competitionId, data, handler) => {
      await axios.post(`${apiURL}/competitions/${competitionId}`,
        { ...data, _method: 'PATCH' },
        { headers: { 'Content-Type': 'multipart/form-data' } },
      )
      .then((response) => { handler(); })
      .catch(catcher)
    },
    destroy: async (competitionId, handler) => {
      await axios.delete(`${apiURL}/competitions/${competitionId}`)
      .then((response) => { handler(); })
      .catch(catcher)
    },
  }
}

export default api;