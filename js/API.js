const getData = async (link, objeto) => {
    const { drink, tag } = objeto;
    try {
      await fetch(`${link}?` + new URLSearchParams({ drink, tag }), {
        method: "GET",
        headers: {
          accept: "Application/json",
        },
      }).then((response) => {
        return response.json().then((data) =>
          data
        );
      });
    } catch (e) {
      console.log("No data found;");
      return [];
    }
  };