YEAR := $(shell date +%Y)
FILE := https://www.losungen.de/fileadmin/media-losungen/download/Losung_$(YEAR)_CSV.zip
ASSETS_FOLDER := # add your assets folder here
LOCAL_ZIP_FILE := $(ASSETS_FOLDER)/Losung_$(YEAR)_CSV.zip
LOCAL_CSV_FILE := $(ASSETS_FOLDER)/Losungen_Free_$(YEAR).csv
LOCAL_UTF8_CSV_FILE := $(ASSETS_FOLDER)/Losungen_Free_$(YEAR)_utf8.csv


help:
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'

# ----------------------------------------------------------------------------------------------------------------
update: ## Update Losungen for current year
	make download
	make extract
	make utf8-encode
	rm -fr *.txt *.pdf *.zip

clean: ## Cleanup space
	rm -rf *.pdf *.zip *.txt
	zip -r archive_$(YEAR).zip *.csv
	mkdir -p archive
	mv archive_$(YEAR).zip ./archive/
	rm *.csv

download: ## Download current Losungen
	wget $(FILE)

extract: ## Extract File
	unzip $(LOCAL_ZIP_FILE)

rename: ## Rename file to remove whitepace
	mv Losungen\ Free\ $(YEAR).csv $(LOCAL_CSV_FILE)

utf8-encode: ## UTF-8 Encoding of the CSV file
	iconv -f windows-1250 -t utf8 $(ASSETS_FOLDER)/Losungen\ Free\ $(YEAR).csv > $(LOCAL_CSV_FILE)
	rm $(ASSETS_FOLDER)/Losungen\ Free\ $(YEAR).csv
