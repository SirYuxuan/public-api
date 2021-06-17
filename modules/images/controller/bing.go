package controller

import (
	"encoding/json"
	"github.com/labstack/echo/v4"
	"io"
	"io/ioutil"
	"net/http"
)

type Bing struct {
}

func (that Bing) GetWallpaper(c echo.Context) error {

	resp, _ := http.Get("https://cn.bing.com/HPImageArchive.aspx?format=js&idx=0&n=1")

	defer func(Body io.ReadCloser) {
		_ = Body.Close()
	}(resp.Body)

	body, _ := ioutil.ReadAll(resp.Body)

	var jsonData map[string]interface{}

	_ = json.Unmarshal(body, &jsonData)

	url := jsonData["images"].([]interface{})[0].(map[string]interface{})["url"].(string)

	imgData, _ := http.Get("https://cn.bing.com/" + url)

	imgByte, _ := ioutil.ReadAll(imgData.Body)

	return c.Blob(http.StatusOK, "image/png", imgByte)

}
