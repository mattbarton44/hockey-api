import axios from 'axios';

const catcher = (e) => console.log(e);
const apiURL = 'https://api.sheffieldbears.co.uk/api'; // 'http://localhost/api';

const api = {
  competitions: {
    index: async (handler) => {
      await axios.get(`${apiURL}/competitions`)
      .then((response) => { handler(response.data.data); })
      .catch(catcher)
    },
    show: async (id, handler) => {
      await axios.get(`${apiURL}/competitions/${id}`)
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
    update: async (id, data, handler) => {
      await axios.post(`${apiURL}/competitions/${id}`,
        { ...data, _method: 'PATCH' },
        { headers: { 'Content-Type': 'multipart/form-data' } },
      )
      .then((response) => { handler(); })
      .catch(catcher)
    },
    destroy: async (id, handler) => {
      await axios.delete(`${apiURL}/competitions/${id}`)
      .then((response) => { handler(); })
      .catch(catcher)
    },
  },
  seasons: {
    index: async (handler) => {
      await axios.get(`${apiURL}/seasons`)
      .then((response) => { handler(response.data.data); })
      .catch(catcher)
    },
    show: async (id, handler) => {
      await axios.get(`${apiURL}/seasons/${id}`)
      .then((response) => { handler(response.data.data); })
      .catch(catcher)
    },
    store: async (data, handler) => {
      await axios.post(`${apiURL}/seasons`, data,
      { headers: { 'Content-Type': 'multipart/form-data' } },)
      .then((response) => { handler(); })
      .catch(catcher)
    },
    update: async (id, data, handler) => {
      await axios.post(`${apiURL}/seasons/${id}`, { ...data, _method: 'PATCH' },
      { headers: { 'Content-Type': 'multipart/form-data' } },)
      .then((response) => { handler(); })
      .catch(catcher)
    },
    destroy: async (id, handler) => {
      await axios.delete(`${apiURL}/seasons/${id}`)
      .then((response) => { handler(); })
      .catch(catcher)
    },
    spawnAllGames: async (id, data, handler) => {
      await axios.post(`${apiURL}/seasons/${id}/spawnAllGames`, data)
      .then((response) => { handler(response.data.data); })
      .catch(catcher)
    },
    bulkStore: async (id, data, handler) => {
      await axios.post(`${apiURL}/seasons/${id}/bulkStore`, data)
      .then((response) => { handler(); })
      .catch(catcher)
    },
  },
  games: {
    index: async (handler) => {
      await axios.get(`${apiURL}/games`)
      .then((response) => { handler(response.data.data); })
      .catch(catcher)
    },
    show: async (id, handler) => {
      await axios.get(`${apiURL}/games/${id}`)
      .then((response) => { handler(response.data.data); })
      .catch(catcher)
    },
    store: async (data, handler) => {
      await axios.post(`${apiURL}/games`, data)
      .then((response) => { handler(); })
      .catch(catcher)
    },
    edit: async (id, handler) => {
      await axios.get(`${apiURL}/games/${id}/edit`)
      .then((response) => { handler(response.data.data); })
      .catch(catcher)
    },
    update: async (id, data, handler) => {
      await axios.post(`${apiURL}/games/${id}`, { ...data, _method: 'PATCH' })
      
      .then((response) => { handler(); })
      .catch(catcher)
    },
    destroy: async (id, handler) => {
      await axios.delete(`${apiURL}/games/${id}`)
      .then((response) => { handler(); })
      .catch(catcher)
    },
  },
  clubs: {
    index: async (handler) => {
      await axios.get(`${apiURL}/clubs`)
      .then((response) => { handler(response.data.data); })
      .catch(catcher)
    },
    show: async (id, handler) => {
      await axios.get(`${apiURL}/clubs/${id}`)
      .then((response) => { handler(response.data.data); })
      .catch(catcher)
    },
    store: async (data, handler) => {
      await axios.post(`${apiURL}/clubs`,
        data,
        { headers: { 'Content-Type': 'multipart/form-data' } }
      )
      .then((response) => { handler(); })
      .catch(catcher)
    },
    update: async (id, data, handler) => {
      await axios.post(`${apiURL}/clubs/${id}`,
        { ...data, _method: 'PATCH' },
        { headers: { 'Content-Type': 'multipart/form-data' } },
      )
      .then((response) => { handler(); })
      .catch(catcher)
    },
    destroy: async (id, handler) => {
      await axios.delete(`${apiURL}/clubs/${id}`)
      .then((response) => { handler(); })
      .catch(catcher)
    },
  },
  teams: {
    index: async (handler) => {
      await axios.get(`${apiURL}/teams`)
      .then((response) => { handler(response.data.data); })
      .catch(catcher)
    },
    show: async (id, handler) => {
      await axios.get(`${apiURL}/teams/${id}`)
      .then((response) => { handler(response.data.data); })
      .catch(catcher)
    },
    store: async (data, handler) => {
      await axios.post(`${apiURL}/teams`,
        data,
        { headers: { 'Content-Type': 'multipart/form-data' } }
      )
      .then((response) => { handler(); })
      .catch(catcher)
    },
    update: async (id, data, handler) => {
      await axios.post(`${apiURL}/teams/${id}`,
        { ...data, _method: 'PATCH' },
        { headers: { 'Content-Type': 'multipart/form-data' } },
      )
      .then((response) => { handler(); })
      .catch(catcher)
    },
    destroy: async (id, handler) => {
      await axios.delete(`${apiURL}/teams/${id}`)
      .then((response) => { handler(); })
      .catch(catcher)
    },
  },
  rosters: {
    index: async (handler) => {
      await axios.get(`${apiURL}/rosters`)
      .then((response) => { handler(response.data.data); })
      .catch(catcher)
    },
    show: async (id, handler) => {
      await axios.get(`${apiURL}/rosters/${id}`)
      .then((response) => { handler(response.data.data); })
      .catch(catcher)
    },
    store: async (data, handler) => {
      await axios.post(`${apiURL}/rosters`, data)
      .then((response) => { handler(); })
      .catch(catcher)
    },
    update: async (id, data, handler) => {
      await axios.post(`${apiURL}/rosters/${id}`, { ...data, _method: 'PATCH' })
      
      .then((response) => { handler(); })
      .catch(catcher)
    },
    destroy: async (id, handler) => {
      await axios.delete(`${apiURL}/rosters/${id}`)
      .then((response) => { handler(); })
      .catch(catcher)
    },
  },
  gameEvents: {
    index: async (handler) => {
      await axios.get(`${apiURL}/gameEvents`)
      .then((response) => { handler(response.data.data); })
      .catch(catcher)
    },
    show: async (id, handler) => {
      await axios.get(`${apiURL}/gameEvents/${id}`)
      .then((response) => { handler(response.data.data); })
      .catch(catcher)
    },
    store: async (data, handler) => {
      await axios.post(`${apiURL}/gameEvents`, data)
      .then((response) => { handler(); })
      .catch(catcher)
    },
    update: async (id, data, handler) => {
      await axios.post(`${apiURL}/gameEvents/${id}`, { ...data, _method: 'PATCH' })
      .then((response) => { handler(); })
      .catch(catcher)
    },
    destroy: async (id, handler) => {
      await axios.delete(`${apiURL}/gameEvents/${id}`)
      .then((response) => { handler(); })
      .catch(catcher)
    },
  }
}

export default api;