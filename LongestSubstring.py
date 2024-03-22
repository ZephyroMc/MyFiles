class Solution:
    def lengthOfLongestSubstring(self, s: str) -> int:
        self.s = s
        Longer=[]
        if len(self.s)!=0:
            
         Longer.append(self.s[0])
         MostLonger=0
         aux=0
         for i in self.s:
             ranger=0
             while ranger < len(Longer):
                 if i == Longer[ranger]:
                     Longer=[Longer[ranger-1],i]
                     aux=0
                 else:
                     aux=1
                 ranger+=1
             if aux == 1:
                 Longer.append(i)  
             if len(Longer)>MostLonger:
                 MostLonger=len(Longer)    
             print(Longer)                     
         return MostLonger
        return 0          
newclass = Solution()
print(newclass.lengthOfLongestSubstring("pwwkew"))


#si p esta en longer vaciar la lista y me teter de lo contraria meter p

























    #   if i == Longer[j]:
     #               Longer=[i]
     #           else:
     #               Longer.append(i)
     #           if len(Longer)>MostLonger:
     #               MostLonger=len(Longer)
     #           print("ciclo J terminado")
     #       print("ciclo I terminado")