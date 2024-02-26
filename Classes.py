class persona:
    def __init__(self, nombre, edad):
        self.nombre = nombre
        self.edad = edad
        
    def mostrar(self):
        print("Nombre: ",self.nombre,"")
        print("Edad: ",self.edad,"")
        
class alumno(persona):
    
    def __init__(self,nombre,edad,notafinal):
        super().__init__(nombre,edad)
        self.notafinal=notafinal
        
    def mostrar(self):
        super().mostrar()
        print("Nota Final: ",self.notafinal,"\n")

class profesor(persona):
    
    def __init__(self,nombre,edad,materia):
        super().__init__(nombre,edad)
        self.materia=materia
        
    def mostrar(self):
        super().mostrar()
        print("materia: ",self.materia,"\n")
        
lista = [
    profesor("Juan", 30, "Lógica"),
    alumno("Jose", 19, 5.0),
    alumno("Maria", 20, 4.2)
]
for elemento in lista:
    elemento.mostrar()

    
        
        
        
    
        

