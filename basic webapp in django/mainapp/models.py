from django.db import models

# Create your models here.
class people(models.Model):
    name = models.CharField(max_length=100)
    phno = models.CharField(max_length=10)
    email = models.EmailField(max_length=150)
    addr = models.CharField(max_length=250)