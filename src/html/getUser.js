
function getUser() {
  const urlParams = newURLSearchParams(window.location.search);
  const myParam = urlParams.get("user");
  return myParam;
};
