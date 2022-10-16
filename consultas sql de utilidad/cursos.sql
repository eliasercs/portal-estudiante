USE [usuario]
GO

INSERT INTO [dbo].[ramos]
           ([code]
           ,[nombre]
           ,[creditos]
           ,[carrera]
           ,[tipo])
     VALUES
           ('INFO1122', 'Programacion',6, 'INFO', 'diciplinar'),
		   ('INFO1123', 'interfaces',5, 'INFO', 'diciplinar'),
		   ('INFO1124', 'Integracion',4, 'INFO', 'diciplinar'),
		   ('INFO1125', 'Sistemas',6, 'INFO', 'diciplinar'),
		   ('MAT1186', 'Calculo',6, 'INFO', 'diciplinar'),
		   ('IET1440', 'biblia',3, 'IET', 'electivo teologico')
		   
GO


