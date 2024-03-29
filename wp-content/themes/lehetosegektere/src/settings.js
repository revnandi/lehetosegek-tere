export default {
  // How many different dispatched actions determine loading progress
  // This is likely determined by how many dispatched actions you have below
  // in the created() method
  LOADING_SEGMENTS: 2,
  API_BASE_PATH: "/wp-json/wp/v2/",
  API_MENUS_PATH: "/wp-json/menus/v1/menus/fomenu",
  API_OPTIONS_PATH: "/wp-json/acf/v3/options/options/",
  API_ACTIVITIES_PATH: "/wp-json/wp/v2/activity",
  API_GRANTS_PATH: "/wp-json/wp/v2/grants",
  API_EVENTS_PATH: "/wp-json/wp/v2/events",
};
