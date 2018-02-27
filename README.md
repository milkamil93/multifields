# multiFields
[EVO] multiFields — custom TV


Создание кастомных полей для документов.

#### Установка: 

Скопировать содержимое в папку __assets/tvs/multifields__.

Создать TV с типом __multifields__.

В возможных значениях TV прописать конфиг, в формате json.

```json
{
  "title": "Заголовок",
  "templates": {
  // шаблоны или шаблон
  }
}
```

Используемые (основные) параметры для создания шаблонов.

### Шаблоны
* __templates__ - объект для шаблонов, возможно указать несколько разных шаблонов для последующего их выбора и подстановки в ТВ.

#### Строки
* __rows__ - выводит строки, основной параметр
* __view__ - вид ячеек в строках, по умолчанию вид по горизонтали ( float - квадратные блоки прижатые друг к другу )


#### Группа
* __group__ - группа
* __title__ - заголовок группы ( 0 / 1 - по умолчанию 1)
* __move__ - показывать иконку перетаскивания (0 / 1 - по умолчанию 0)
* __novalue__ - возможность изменения названия группы ( 0 / 1 - по умолчанию 1)
* __hidden__ - скрыть из списка выбора (0 / 1 - по умолчанию 0)
* __templates__ - шаблоны через запятую, которые есть в списке выбора в группе (по умолчанию все шаблоны)

#### Секция
* __section__ - секция (объединяет в себя набор групп, строк, полей)

#### Ячейки
* __items__ - ячейки в строке (обязательный для объединения ячеек)

### Ячейка
* __type__ - тип ячейки, одноимённый как и типы ТВ (обязательный)
* __title__ - заголовок ячейки (не обязательный)
* __width__ - ширина (не обязательный)
* __placeholder__ - плейсхолдер (не обязательный)
* __elements__ - указываются как возможные значения для типов с множественными значениями.  (не обязательный)
* __default__ - значение по умолчанию  (не обязательный)

### Thumb
* __type__ - thumb, один из сложных параметров, вмещающий в себя требуемое количество полей, но скрывающийся под "заглушкой" - картинкой

==========================================


### Примеры
(для написания конфигураций использовался сервис http://jsonviewer.stack.hu/)

#### __Описание с изображением__

* Images - уникальный идентификатор шаблона, отличный от основных параметров
* title - название шаблона в поле выбора шаблонов (если не ставить, будет использоваться идентификатор)
* rows - служебный параметр, ставится обязательно, даже если одна ячейка
* items - служебный параметр, вмещает в себя поял по горизонтали, одно и более полей
* Description - уникальный идентификатор ячейки
* Image - уникальный идентификатор ячейки

<img src="https://api.monosnap.com/rpc/file/download?id=XDmUPNCjOYn1Icc7kqrfUdoz97YxLs">

```json
{
  "templates": {
    "Images": {
      "title": "Изображения",
      "rows": [
        {
          "items": [
            {
              "Description": {
                "type": "text",
                "title": "Описание",
                "placeholder": "Описание"
              }
            },
            {
              "Image": {
                "type": "image",
                "title": "Изображение",
                "placeholder": "Изображение"
              }
            }
          ]
        }
      ]
    }
  }
}
```

#### __Группа__

* Group - уникальный идентификатор шаблона
* title - название шаблона в поле выбора шаблонов (если не ставить, будет использоваться идентификатор)
* group - служебный параметр, для создания группы
* placeholder - плейсхолдер (подсказка) в поле названия группы
* rows - служебный параметр, для создания строки значений. Если оставить пустым, то группа по умолчанию будет пустая
<img src="https://api.monosnap.com/rpc/file/download?id=ZnvteVSZ2ZOrEaaxjfpwRrksVKrLzB">

```json
{
  "templates": {
    "Group": {
      "title": "Группа",
      "group": {
        "placeholder": "Название группы",
        "rows": [
          
        ]
      }
    }
  }
}
```

#### __HTML блок__
* RichText - уникальный идентификатор шаблона
* rows - служебный параметр, ставится обязательно, даже если одна ячейка
* RichText - уникальный идентификатор ячейки
* type - тип поля (richtext - html редактор по умолчанию)
* placeholder - подсказка в поле
<img src="https://api.monosnap.com/rpc/file/download?id=GaPMAHgBJpNo71y6QppnEqxeAQis3a">

```json
{
  "templates": {
    "RichText": {
      "rows": [
        {
          "RichText": {
            "type": "richtext",
            "placeholder": "RichText"
          }
        }
      ]
    }
  }
}

```

#### __Слайдер__
* Slider - уникальный идентификатор шаблона
* rows - служебный параметр, ставится обязательно, даже если одна ячейка
* items - служебный параметр, вмещает в себя поял по горизонтали, одно и более полей
* Thumb - уникальный идентификатор поля
* type - тип поля
* rows - служебный параметр, ставится обязательно, даже если одна ячейка
* description - уникальный идентификатор поля
* type - тип поля
* placeholder - подсказка в поле
* image - уникальный идентификатор поля
* type - тип поля
* thumb - превью для выбраного значения в поле
* placeholder - подсказка в поле
<img src="https://api.monosnap.com/rpc/file/download?id=Y0k98uWXEwa32bl1WMxpMtRDI1xDzY">

```json
{
  "templates": {
    "Slider": {
      "rows": [
        {
          "items": [
            {
              "Thumb": {
                "type": "thumb"
              }
            },
            {
              "rows": [
                {
                  "description": {
                    "type": "text",
                    "placeholder": "описание"
                  }
                },
                {
                  "image": {
                    "type": "image",
                    "thumb": "Thumb",
                    "placeholder": "изображение"
                  }
                }
              ]
            }
          ]
        }
      ]
    }
  }
}
```

#### __Слайд-шоу__
* SlideShow - уникальный идентификатор шаблона
* view - тип отображения
* rows - служебный параметр, ставится обязательно, даже если одна ячейка
* Thumb - служит заглушкой для полей внутри себя
* value - можно указать значение по умолчанию (путь до картинки)
<img src="https://api.monosnap.com/rpc/file/download?id=epPvZBczYymYOump3XQ5b3OupLS5NX">

```json
{
  "templates": {
    "SlideShow": {
      "view": "float",
      "rows": [
        {
          "Thumb": {
            "type": "thumb",
            "value": "",
            "rows": [
              {
                "description": {
                  "type": "text",
                  "placeholder": "название"
                }
              },
              {
                "image": {
                  "type": "image",
                  "thumb": "Thumb",
                  "placeholder": "изображение"
                }
              },
              {
                "text": {
                  "type": "textareamini",
                  "placeholder": "описание"
                }
              }
            ]
          }
        }
      ]
    }
  }
}
```

#### __Макет в три колонки__
* Cols3 - уникальный идентификатор шаблона
* rows - служебный параметр, ставится обязательно, даже если одна ячейка
* items - служебный параметр, вмещает в себя поял по горизонтали, одно и более полей
* group - служебный параметр, для создания группы
* move - отображение иконки перетаскивания (0 - не показывать)
* title - название группы
* novalue - название как текст, не меняется
* width - ширина колонки
* rows - служебный параметр, ставится обязательно, даже если одна ячейка
<img src="https://api.monosnap.com/rpc/file/download?id=1svPd6TlZkhAJhgIRya657kb4jIPEn">

```json
{
  "templates": {
    "Cols3": {
      "rows": [
        {
          "items": [
            {
              "group": {
                "move": "0",
                "title": "Col 1",
                "novalue": "1",
                "width": "33%",
                "rows": [
                  
                ]
              }
            },
            {
              "group": {
                "move": "0",
                "title": "Col 2",
                "novalue": "1",
                "width": "34%",
                "rows": [
                  
                ]
              }
            },
            {
              "group": {
                "move": "0",
                "title": "Col 3",
                "novalue": "1",
                "width": "33%",
                "rows": [
                  
                ]
              }
            }
          ]
        }
      ]
    }
  }
}
```

#### __Секция__

Набор полей

<img src="https://api.monosnap.com/rpc/file/download?id=Ty8Cn8S8qx7hkScBWYIHOUC3uS7Lyp">

```json
{
  "templates": {
    "Section": {
      "section": {
        "title": "Section",
        "rows": [
          {
            "items": [
              {
                "Description": {
                  "type": "text",
                  "title": "Описание",
                  "placeholder": "Описание"
                }
              },
              {
                "Image": {
                  "type": "image",
                  "title": "Изображение",
                  "placeholder": "Изображение"
                }
              }
            ]
          },
          {
            "Description": {
              "type": "text",
              "title": "Описание",
              "placeholder": "Описание"
            }
          },
          {
            "Image": {
              "type": "image",
              "title": "Изображение",
              "placeholder": "Изображение"
            }
          },
          {
            "group": {
              "placeholder": "Название группы"
            }
          }
        ]
      }
    }
  }
}
```
