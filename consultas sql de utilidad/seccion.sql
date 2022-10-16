USE [usuario]
GO

INSERT INTO [dbo].[seccion]
           ([numero]
           ,[curso]
           ,[profesor]
           ,[horario]
           ,[sala]
           ,[capacidad]
           ,[inscritos])
     VALUES
           (1,'INFO1122','ketterer','Martes 11:30-14:00','EB203',40,0),
		   (2,'INFO1122','ketterer','Miercoles 11:30-14:00','EB202',30,0),
		   (3,'INFO1122','ketterer','Jueves 11:30-14:00','EDU201',30,0),
		   (1,'INFO1123','ketterer','Martes 15:30-17:00','EB303',20,0),
		   (2,'INFO1123','ketterer','Miercoles 11:30-14:00','EB203',20,0),
		   (1,'INFO1124','eliot','viernes 12:30-14:00','EB203',40,0),
		   (2,'INFO1124','eliot','Martes 17:30-19:00','EB203',30,0),
		   (1,'INFO1125','caro','Martes 8:00-10:30','EB203',45,0),
		   (1,'MAT1186','julio profe','Jueves 11:30-14:00','CT203',50,0),
		   (1,'IET1440','juan','Lunes 11:30-14:00','EB203',30,0),
		   (1,'IET1440','juan','Viernes 11:30-14:00','EB203',30,0)
GO


