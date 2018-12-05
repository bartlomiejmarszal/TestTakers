# Test Takers Api

## Description

Application will return json response with data from csv and json file. 
This project was made for recruitment purposes in company: Open Assessment Technologies

## Installation

To install application please follow below instruction:

### Clone repository

`git clone https://github.com/bartlomiejmarszal/TestTakers.git`

### Composer install

`composer install`

### Config

To run application you have to set your data files source.
You can use default place

`var/data`

or edit environment variable `DATA_SOURCE_DIR` 
 
## Testing

For unit test run PhpUnit binary file

`./bin/phpunit`