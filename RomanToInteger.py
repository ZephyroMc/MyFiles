class Solution:
    def romanToInt(self, s: str) -> int:
        self.s=s.lower()
        NumberAux=0
        Roman=[]
        res=0
        for i in range(len(self.s)):
            if self.s[i] =="i":
                NumberAux=1
            elif self.s[i] == "v":
                NumberAux=5
            elif self.s[i] == "x":
                NumberAux=10
            elif self.s[i] == "l":
                NumberAux=50
            elif self.s[i] == "c":
                NumberAux=100
            elif self.s[i] == "d":
                NumberAux=500
            elif self.s[i] == "m":
                NumberAux=1000
            Roman.append(NumberAux)
        for i in range(len(self.s)):
            
            if len(Roman)>1:
                aux1=Roman.pop(-1)
                aux2=Roman.pop(-1)
                if aux1>aux2:
                 res+=aux1-aux2 
                elif aux1<=aux2:
                 res+=aux1+aux2
            elif len(Roman)==1:
                aux1=Roman.pop(-1)
                res+=aux1
        return res
                   


newclass = Solution()
print(newclass.romanToInt("MCDLXXVI"))




