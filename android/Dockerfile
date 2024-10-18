# android/Dockerfile
FROM androidsdk/android-30

# Install VNC server and other necessary packages
RUN apt-get update && apt-get install -y \
    x11vnc xvfb \
    && mkdir ~/.vnc \
    && echo "password" | x11vnc -storepasswd -o ~/.vnc/passwd

# Set up VNC server
CMD ["sh", "-c", "xvfb-run -n 1 -s '-screen 0 1280x800x24' x11vnc -display :1 -nopw -forever & tail -f /dev/null"]
