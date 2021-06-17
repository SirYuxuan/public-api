package main

import (
	"PublicApi/modules/images/controller"
	"github.com/labstack/echo/v4"
)

func main() {
	e := echo.New()
	e.GET("/images/bing/getWallpaper", controller.Bing{}.GetWallpaper)
	e.Logger.Fatal(e.Start(":1323"))
}
