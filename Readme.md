# cyve/resize

## Installation
```bash
make phar
cp resize.phar /usr/local/bin/resize
```

## Usage
```bash
$ resize --help
Usage:
  resize [options] [--] <src>

Arguments:
  src                  The path of the image or directory of images to resize.

Options:
      --format         [default: "3:2"]
  -h, --help           Display help for the given command. When no command is given display help for the C:/Users/Cyril/bin/resize command
  -q, --quiet          Do not output any message
  -V, --version        Display this application version
      --ansi|--no-ansi Force (or disable --no-ansi) ANSI output
  -n, --no-interaction Do not ask any interactive question
  -v|vv|vvv, --verbose Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug
```
Example :
```bash
resize /home/cyve/images/family --format=4:3
```
