import axios from 'axios';
import SETTINGS from '../settings';

export default {
  getOptions(cb) {
    axios
      .get(
        SETTINGS.API_OPTIONS_PATH
      )
      .then(response => {
        cb(response.data.acf);
      })
      .catch(e => {
        cb(e);
      });
  },

  getCategories(cb) {
    axios
      .get(
        SETTINGS.API_BASE_PATH +
          'categories?sort=name&hide_empty=true&per_page=50'
      )
      .then(response => {
        cb(response.data.filter(c => c.name !== 'Uncategorized'));
      })
      .catch(e => {
        cb(e);
      });
  },

  getPages(cb) {
    axios
      .get(SETTINGS.API_BASE_PATH + 'pages?per_page=10')
      .then(response => {
        cb(response.data);
      })
      .catch(e => {
        cb(e);
      });
  },

  getPage(id, cb) {
    if(!Number.isInteger(id) || !id)
      return false;

    axios
      .get(SETTINGS.API_BASE_PATH + 'pages/' + id)
      .then(response => {
        cb(response.data);
      })
      .catch(e => {
        cb(e);
      });
  },

  getPosts(limit = 50, cb) {
    axios
      .get(SETTINGS.API_BASE_PATH + 'posts?per_page=' + limit)
      .then(response => {
        cb(response.data);
      })
      .catch(e => {
        cb(e);
      });
  },

  getActivities(cb) {
    axios
      .get(
        SETTINGS.API_ACTIVITIES_PATH
      )
      .then(response => {
        cb(response.data);
      })
      .catch(e => {
        cb(e);
      });
  },

  getEvents(limit = 5, cb) {
    axios
      .get(SETTINGS.API_BASE_PATH + 'events?per_page=' + limit)
      .then(response => {
        cb(response.data);
      })
      .catch(e => {
        cb(e);
      });
  },

};
