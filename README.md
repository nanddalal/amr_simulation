amr_simulation
==============

Note: if you ever get an error in the following process, sudo !!

1. Get the latest versions of opencore-amr and vo-amrwbenc:
	* http://sourceforge.net/projects/opencore-amr/
	* `sudo apt-get install libmp3lame-dev`

1. Move both tar.gz files into /usr/src:
	* `mv ~/Downloads/___.tar.gz /usr/src`

1. Now install the amr-nb/wb encoders/decoders:
	* `cd /usr/src`
	* `tar -zxvf ___.tar.gz`
	* `cd ___`
	* `./configure`
	* `make`
	* `make install`

1. Make necessary directories and get the ffmpeg source using git:
	* `mkdir ~/ffmpeg_sources`
	* `cd ~/ffmpeg_sources`
	* `git clone --depth 1 git://source.ffmpeg.org/ffmpeg`
	* `cd ffmpeg`

1. Configure your ffmpeg with the amr-nb/wb encoders/decoders:
	* `./configure --prefix=/usr/local --enable-gpl --enable-nonfree --enable-shared --enable-postproc --enable-avfilter --enable-pthreads --enable-bzlib --enable-libopencore-amrnb --enable-libopencore-amrwb --enable-libmp3lame --enable-zlib --enable-version3 --enable-libvo-amrwbenc`
	* `make`
	* `su -c 'make install'`
	* `export LD_LIBRARY_PATH=$LD_LIBRARY_PATH:/usr/local/lib`

1. Configure the audio file clean up
	* `cd /opt/lampp/htdocs/amr_simulation`
	* `chmod -R 777 audio/`
	* `cd audio`
	* `chmod +x /opt/lampp/htdocs/amr_simulation/audio/cron.sh`
	* `sudo crontab -e`
	* `0 0 * * * /opt/lampp/htdocs/amr_simulation/audio/cron.sh`

1. Enable ssh and start lampp on boot
	* `sudo apt-get install openssh-server`
	* `/etc/init.d/ssh start`
	* `sudo vim /etc/init.d/lampp`
	* Place the following lines in script: `#!/bin/bash` and `/opt/lampp/lampp start`
	* sudo chmod +x /etc/init.d/lampp
	* cd /etc/init.d
	* sudo update-rc.d lampp defaults
