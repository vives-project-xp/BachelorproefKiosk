FROM python:3

WORKDIR /usr/src/app

COPY python.py ./
COPY repeater.sh ./
RUN chmod +x repeater.sh
RUN pip install mysql mysql-connector-python python-dotenv requests

CMD [ "./repeater.sh" ]
