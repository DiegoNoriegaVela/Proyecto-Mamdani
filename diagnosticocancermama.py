#Fuente: https://www.ncbi.nlm.nih.gov/pmc/articles/PMC3772701/?fbclid=IwAR1al0TQdSuaN-L1Kg90JEWiRpEM4WVaUfCwGT9tUcMzqLABkaZxprNmfeU

#LIBRERÍAS
import sys
import numpy as np
import skfuzzy as fuzz
import matplotlib.pyplot as plt

#INGRESO DE PARÁMETROS

#IMGRESO DESDE PHP
input_general = sys.argv[1]
variables = input_general.split(",")
area_ingreso = variables[0]
peri_ingreso = variables[1]
unif_ingreso= variables[2]
homog_ingreso = variables[3]


'''
#IMGRESO MANUAL
print("\n\n-------------Pre-diagnóstico de cancer de mama-------------\n\n")
print("Ingrese datos correspondientes para ser analizados con lógica difusa\n\n")

area_ingreso = float(input("Area[185-4255]: "))
peri_ingreso = float(input("Perímetro[50-252]: "))
unif_ingreso = float(input("Uniformidad[0-12]: "))
homog_ingreso = float(input("Homogeneidad[0.01-0.45]: "))

print("\n\nLos valores se estan procesando.")
'''

'''
#AUTOMATICO
area_ingreso = 3000
peri_ingreso = 100
unif_ingreso = 2.5
homog_ingreso = 0.1
'''

#UNIVERSO DEL DISCURSO
N = 1000 # numero de muestras

in_area = np.linspace(185,4255, num=N)
in_peri = np.linspace(50,252, num=N)
in_unif = np.linspace(0,12, num=N)
in_homog = np.linspace(0.01,0.45, num=N)
out_prediag = np.linspace(0,1, num=N)


#DEFINICIÓN DE LOS CONJUNTOS DIFUSOS
#Funciones de pertenencia - AREA
area_peque = fuzz.trapmf(in_area, [184.5, 185, 748.8, 1000])
area_largo = fuzz.trapmf(in_area, [508.1, 2194, 4255, 4256])

#Funciones de pertenencia - PERIMETRO
peri_peque = fuzz.trapmf(in_peri, [49.5, 50, 92.58, 103])
peri_largo = fuzz.trapmf(in_peri, [85.1, 159.8, 252, 252.5])

#Funciones de pertenencia - UNIFORMIDAD
unif_mayor = fuzz.trapmf(in_unif, [-0.5, 0, 1.669, 2.6])
unif_menor = fuzz.trapmf(in_unif, [0.65, 6.205, 12, 12.5])

#Funciones de pertenencia - HOMEGENEIDAD
homog_mayor = fuzz.trapmf(in_homog, [0, 0.01, 0.1232, 0.19])
homog_menor = fuzz.trapmf(in_homog, [0.0295, 0.2168, 0.45, 0.5])

#Funciones de pertenencia - PREDIAGNÓSTICO
prediag_benigno = fuzz.trapmf(out_prediag, [-0.5 ,0 ,0.4 , 0.5])
prediag_indefinido = fuzz.trimf(out_prediag, [0.5, 0.55, 0.6,])
prediag_maligno = fuzz.trapmf(out_prediag, [0.6 ,0.7, 1, 1.5])


#GRAFICANDO CONJUNTOS DIFUSOS
fig, (graf1, graf2, graf3, graf4, graf5) = plt.subplots(nrows = 5, figsize =(10, 25))
#Grafico - EDAD
graf1.plot(in_area, area_peque, 'r', label = 'Pequeña')
graf1.plot(in_area, area_largo, 'g', label = 'Larga')
graf1.set_title('Área')
graf1.legend()

#Grafico - PERIMETRO
graf2.plot(in_peri, peri_peque, 'r', label = 'Pequeña')
graf2.plot(in_peri, peri_largo, 'g', label = 'Larga')
graf2.set_title('Perímetro')
graf2.legend()

#Grafico - UNIFORMIDAD
graf3.plot(in_unif, unif_mayor, 'r', label = 'Mayor')
graf3.plot(in_unif, unif_menor, 'g', label = 'Menor')
graf3.set_title('Uniformidad')
graf3.legend()

#Grafico - HOMOGENEIDAD
graf4.plot(in_homog, homog_mayor, 'r', label = 'Mayor')
graf4.plot(in_homog, homog_menor, 'g', label = 'Menor')
graf4.set_title('Homogeneidad')
graf4.legend()

#Grafico - PREDIAGNÓSTICO
graf5.plot(out_prediag, prediag_benigno, 'r', label = 'Benigno')
graf5.plot(out_prediag, prediag_indefinido, 'g', label = 'Indefinido')
graf5.plot(out_prediag, prediag_maligno, 'b', label = 'Maligno')
graf5.set_title('Pre-diagnóstico')
graf5.legend()

#plt.tight_layout()
plt.savefig("/home/admin/web/proyectosistintg5.ml/public_html/conjdif.jpg")

#MÉTODO DE INFERENCIA - MAMDANI


#FUZZIFICACIÓN
#Grados de pertenecia - AREA
val_area_peque = fuzz.interp_membership(in_area, area_peque, area_ingreso)
val_area_largo = fuzz.interp_membership(in_area, area_largo, area_ingreso)

#Grados de pertenecia - PERIMETRO
val_peri_peque = fuzz.interp_membership(in_peri, peri_peque, peri_ingreso)
val_peri_largo = fuzz.interp_membership(in_peri, peri_largo, peri_ingreso)

#Grados de pertenecia - UNIFORMIDAD
val_unif_mayor = fuzz.interp_membership(in_unif, unif_mayor, unif_ingreso)
val_unif_menor = fuzz.interp_membership(in_unif, unif_menor, unif_ingreso)

#Grados de pertenecia - HOMOGENEIDAD
val_homog_mayor = fuzz.interp_membership(in_homog, homog_mayor, homog_ingreso)
val_homog_menor = fuzz.interp_membership(in_homog, homog_menor, homog_ingreso)

#GRAFICANDO INTERSECCIÓN CON CONJUNTOS DIFUSOS
fig, (graf1, graf2, graf3, graf4) = plt.subplots(nrows=4, figsize=(10, 25))
#Grafico - EDAD
graf1.plot(in_area, area_peque, 'r', label = 'Pequeña')
graf1.plot(in_area, area_largo, 'g', label = 'Larga')
graf1.set_title('Área')
graf1.legend()
graf1.plot([area_ingreso,area_ingreso],[0.0, 1.0],linestyle='--')
graf1.plot(area_ingreso,val_area_peque,'x')
graf1.plot(area_ingreso,val_area_largo,'x')

#Grafico - PERIMETRO
graf2.plot(in_peri, peri_peque, 'r', label = 'Pequeña')
graf2.plot(in_peri, peri_largo, 'g', label = 'Larga')
graf2.set_title('Perímetro')
graf2.legend()
graf2.plot([peri_ingreso,peri_ingreso],[0.0, 1.0],linestyle='--')
graf2.plot(peri_ingreso,val_peri_peque,'x')
graf2.plot(peri_ingreso,val_peri_largo,'x')

#Grafico - UNIFORMIDAD
graf3.plot(in_unif, unif_mayor, 'r', label = 'Mayor')
graf3.plot(in_unif, unif_menor, 'g', label = 'Menor')
graf3.set_title('Uniformidad')
graf3.legend()
graf3.plot([unif_ingreso,unif_ingreso],[0.0, 1.0],linestyle='--')
graf3.plot(unif_ingreso,val_unif_mayor,'x')
graf3.plot(unif_ingreso,val_unif_menor,'x')

#Grafico - HOMOGENEIDAD
graf4.plot(in_homog, homog_mayor, 'r', label = 'Mayor')
graf4.plot(in_homog, homog_menor, 'g', label = 'Menor')
graf4.set_title('Homogeneidad')
graf4.legend()
graf4.plot([homog_ingreso,homog_ingreso],[0.0, 1.0],linestyle='--')
graf4.plot(homog_ingreso,val_homog_mayor,'x')
graf4.plot(homog_ingreso,val_homog_menor,'x')

#plt.tight_layout()
plt.savefig("/home/admin/web/proyectosistintg5.ml/public_html/intersec.jpg")

#BASE DE REGLAS
regla1 = np.fmin(np.fmin(np.fmin(np.fmin(val_area_peque, val_peri_peque), val_unif_mayor), val_homog_mayor), prediag_benigno)
regla2 = np.fmin(np.fmin(np.fmin(np.fmin(val_area_peque, val_peri_peque), val_unif_mayor), val_homog_menor), prediag_indefinido)
regla3 = np.fmin(np.fmin(np.fmin(np.fmin(val_area_peque, val_peri_peque), val_unif_menor), val_homog_mayor), prediag_indefinido)
regla4 = np.fmin(np.fmin(np.fmin(np.fmin(val_area_peque, val_peri_peque), val_unif_menor), val_homog_menor), prediag_indefinido)
regla5 = np.fmin(np.fmin(np.fmin(np.fmin(val_area_peque, val_peri_largo), val_unif_mayor), val_homog_mayor), prediag_indefinido)
regla6 = np.fmin(np.fmin(np.fmin(np.fmin(val_area_peque, val_peri_largo), val_unif_mayor), val_homog_menor), prediag_indefinido)
regla7 = np.fmin(np.fmin(np.fmin(np.fmin(val_area_peque, val_peri_largo), val_unif_menor), val_homog_mayor), prediag_indefinido)
regla8 = np.fmin(np.fmin(np.fmin(np.fmin(val_area_peque, val_peri_largo), val_unif_menor), val_homog_menor), prediag_indefinido)
regla9 = np.fmin(np.fmin(np.fmin(np.fmin(val_area_largo, val_peri_peque), val_unif_mayor), val_homog_mayor), prediag_indefinido)
regla10 = np.fmin(np.fmin(np.fmin(np.fmin(val_area_largo, val_peri_peque), val_unif_mayor), val_homog_menor), prediag_indefinido)
regla11 = np.fmin(np.fmin(np.fmin(np.fmin(val_area_largo, val_peri_peque), val_unif_menor), val_homog_mayor), prediag_indefinido)
regla12 = np.fmin(np.fmin(np.fmin(np.fmin(val_area_largo, val_peri_peque), val_unif_menor), val_homog_menor), prediag_indefinido)
regla13 = np.fmin(np.fmin(np.fmin(np.fmin(val_area_largo, val_peri_largo), val_unif_mayor), val_homog_mayor), prediag_indefinido)
regla14 = np.fmin(np.fmin(np.fmin(np.fmin(val_area_largo, val_peri_largo), val_unif_mayor), val_homog_menor), prediag_indefinido)
regla15 = np.fmin(np.fmin(np.fmin(np.fmin(val_area_largo, val_peri_largo), val_unif_menor), val_homog_mayor), prediag_indefinido)
regla16 = np.fmin(np.fmin(np.fmin(np.fmin(val_area_largo, val_peri_largo), val_unif_menor), val_homog_menor), prediag_maligno)

#Union Conjuntos de Reglas
out_prediag_benigno = regla1
out_prediag_indefinido = np.fmax(np.fmax(np.fmax(np.fmax(np.fmax(np.fmax(np.fmax(np.fmax(np.fmax(np.fmax(np.fmax(np.fmax(np.fmax(regla2,regla3),regla4),regla5),regla6),regla7),regla8),regla9),regla10),regla11),regla12),regla13),regla14),regla15)
out_prediag_maligno = regla16


#DEFUZZIFICACIÓN

#Agregación
prediag_aggregated = np.fmax(np.fmax(out_prediag_benigno, out_prediag_indefinido),out_prediag_maligno)

#Funcion de defuzzificacion: Centroide 
prediag_defuzzified  = fuzz.defuzz(out_prediag, prediag_aggregated, 'centroid') # eje x del centroide
prediag_y = fuzz.interp_membership(out_prediag, prediag_aggregated, prediag_defuzzified) # eje y del centroide

#Hallar el nivel de pertenencia
pert_prediag_benigno=fuzz.interp_membership(out_prediag,prediag_benigno,prediag_defuzzified)
pert_prediag_indefinido=fuzz.interp_membership(out_prediag,prediag_indefinido,prediag_defuzzified)
pert_prediag_maligno=fuzz.interp_membership(out_prediag,prediag_maligno,prediag_defuzzified)

print(prediag_defuzzified,pert_prediag_benigno,pert_prediag_indefinido,pert_prediag_maligno)

#Graficando recorte y resultado
fig, graf1 = plt.subplots(figsize=(8, 6))
graf1.plot(out_prediag, prediag_benigno, 'r', linewidth = 0.5, linestyle = '--')
graf1.plot(out_prediag, prediag_indefinido, 'g', linewidth = 0.5, linestyle = '--')
graf1.plot(out_prediag, prediag_maligno, 'b', linewidth = 0.5, linestyle = '--')
graf1.plot(out_prediag, prediag_aggregated)
graf1.plot(prediag_defuzzified, prediag_y, marker='o')
graf1.set_title('Defuzzificación - Centroide')

#plt.tight_layout()
plt.savefig("/home/admin/web/proyectosistintg5.ml/public_html/resultado.jpg")